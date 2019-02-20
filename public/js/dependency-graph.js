// This product includes color specifications and designs developed by Cynthia Brewer (http://colorbrewer.org/).
var colorbrewer = {
  RdBu: {
    3: ["#ef8a62", "#f7f7f7", "#67a9cf"],
    4: ["#ca0020", "#f4a582", "#92c5de", "#0571b0"],
    5: ["#ca0020", "#f4a582", "#f7f7f7", "#92c5de", "#0571b0"],
    6: ["#b2182b", "#ef8a62", "#fddbc7", "#d1e5f0", "#67a9cf", "#2166ac"],
    7: [
      "#b2182b",
      "#ef8a62",
      "#fddbc7",
      "#f7f7f7",
      "#d1e5f0",
      "#67a9cf",
      "#2166ac"
    ],
    8: [
      "#b2182b",
      "#d6604d",
      "#f4a582",
      "#fddbc7",
      "#d1e5f0",
      "#92c5de",
      "#4393c3",
      "#2166ac"
    ],
    9: [
      "#b2182b",
      "#d6604d",
      "#f4a582",
      "#fddbc7",
      "#f7f7f7",
      "#d1e5f0",
      "#92c5de",
      "#4393c3",
      "#2166ac"
    ],
    10: [
      "#67001f",
      "#b2182b",
      "#d6604d",
      "#f4a582",
      "#fddbc7",
      "#d1e5f0",
      "#92c5de",
      "#4393c3",
      "#2166ac",
      "#053061"
    ],
    11: [
      "#67001f",
      "#b2182b",
      "#d6604d",
      "#f4a582",
      "#fddbc7",
      "#f7f7f7",
      "#d1e5f0",
      "#92c5de",
      "#4393c3",
      "#2166ac",
      "#053061"
    ]
  }
};

function floydWarshall(vertices, edges, accessor) {
  accessor =
    typeof accessor !== "undefined"
      ? accessor
      : function(d) {
          return d;
        };

  var dm = new function() {
    // the all pairs shortest path distance matrix
    var self = this;
    this.distMatrix = [];
    this.nextMatrix = [];
    this.max = 0;

    this.dist = function(v1, v2) {
      return self.distMatrix[[accessor(v1), accessor(v2)]];
    };

    this.set = function(v1, v2, val) {
      if (val > self.max && val != Infinity) self.max = val;
      self.distMatrix[[accessor(v1), accessor(v2)]] = val;
    };

    this.setNext = function(v1, v2, v) {
      self.nextMatrix[[accessor(v1), accessor(v2)]] = v;
    };

    this.next = function(v1, v2) {
      return self.nextMatrix[[accessor(v1), accessor(v2)]];
    };

    this.path = function(u, v) {
      if (!self.next(u, v)) return [];
      var path = [];
      for (; u != v; u = self.next(u, v)) path.push(u);

      for (var i = 0; i < path.length; i++)
        path[i] = {
          source: path[i],
          target: i == path.length - 1 ? v : path[i + 1]
        };

      return path;
    };
  }();

  var dist = function(i, j) {
    return dm.dist(vertices[i], vertices[j]);
  };

  for (var i = 0; i < vertices.length; i++) {
    var v1 = vertices[i];
    for (var j = 0; j < vertices.length; j++) {
      var v2 = vertices[j];
      if (v1 != v2) {
        dm.set(v1, v2, Infinity);
        dm.set(v2, v1, Infinity);
      }
    }
    dm.set(v1, v1, 0);
  }

  for (var i = 0; i < edges.length; i++) {
    var u = edges[i].source,
      v = edges[i].target;
    dm.set(u, v, 1);
    dm.setNext(u, v, v);
  }

  for (var k = 0; k < vertices.length; k++) {
    for (var i = 0; i < vertices.length; i++) {
      for (var j = 0; j < vertices.length; j++) {
        if (dist(i, j) > dist(i, k) + dist(k, j)) {
          dm.set(vertices[i], vertices[j], dist(i, k) + dist(k, j));
          dm.setNext(
            vertices[i],
            vertices[j],
            dm.next(vertices[i], vertices[k])
          );
        }
      }
    }
  }

  return dm;
}

var width = 1024,
  height = 1024;

var force = cola
  .d3adaptor()
  .linkDistance(120)
  .size([width, height])
  .flowLayout("y", 75);

var svg = d3
  .select("#graph")
  .append("svg")
  .attr("width", width)
  .attr("height", height)
  .style("pointer-events", "all");

svg
  .append("rect")
  .attr("class", "background")
  .attr("width", "100%")
  .attr("height", "100%")
  .call(
    d3.behavior.zoom().on("zoom", function() {
      viewport.attr(
        "transform",
        "translate(" + d3.event.translate + ")scale(" + d3.event.scale + ")"
      );
    })
  );

var viewport = svg.append("g");

var focusedNode = null;

svg
  .append("svg:defs")
  .append("svg:marker")
  .attr("id", "end-arrow")
  .attr("viewBox", "0 -5 10 10")
  .attr("markerWidth", 6)
  .attr("markerHeight", 6)
  .attr("orient", "auto")
  .append("svg:path")
  .attr("d", "M0,-5L10,0L0,5")
  .attr("stroke-width", "0px")
  .attr("fill", "#666");

var lineFunction = d3.svg
  .line()
  .x(function(d) {
    return d.x;
  })
  .y(function(d) {
    return d.y;
  })
  .interpolate("linear");

d3.dsv("@", "text/plain")("dependency-graph-data")
  .row(function(d) {
    // d3 does not parse multiple character delimiters well, but we can cope...
    var parent = d["parent"],
      child = d["child"];
    return { nodes: [parent, child], link: { source: parent, target: child } };
  })
  .get(function(err, rows) {
    var nodes = rows
      .reduce(function(acc, row) {
        acc.add(row.nodes[0]);
        acc.add(row.nodes[1]);
        return acc;
      }, d3.set([]))
      .values()
      .map(function(node) {
        return { name: node };
      });

    var links = rows.map(function(row) {
      var sourceNode = nodes.filter(function(n) {
        return n.name == row.link.source;
      })[0];
      var targetNode = nodes.filter(function(n) {
        return n.name == row.link.target;
      })[0];
      return { source: sourceNode, target: targetNode };
    });

    var distMatrix = floydWarshall(nodes, links, function(d) {
      return d.name;
    });

    force
      .nodes(nodes)
      .links(links)
      .start(10, 30, 100);

    var link = viewport.selectAll(".link").data(links);

    link
      .enter()
      .append("svg:path")
      .attr("class", "link")
      .attr("id", function(d) {
        return d.source.index + "_" + d.target.index;
      });

    var edgeLabelText = viewport
      .selectAll(".edgeLabel")
      .data(links)
      .enter()
      .append("svg:text")
      .attr("class", "edgeLabel");

    var edgeLabelPath = edgeLabelText
      .append("svg:textPath")
      .attr("text-anchor", "middle")
      .attr("xlink:href", function(d) {
        return "#" + d.source.index + "_" + d.target.index;
      })
      .attr("startOffset", "60%");

    var node = viewport.selectAll(".node").data(nodes);

    var nodeEnter = node
      .enter()
      .append("g")
      .attr("class", "node")
      .call(force.drag);

    nodeEnter
      .append("circle")
      .attr("r", 16)
      .on("click", function(d) {
        focusOnNode(d, node, edgeLabelPath, distMatrix);
      })
      .on("mouseover", function(d) {
        focusOnPath(d, link, distMatrix);
      });

    nodeEnter
      .append("text")
      .attr("text-anchor", "right")
      .attr("dx", "-1.5em")
      .attr("dy", ".35em")
      .text(function(d) {
        return d.name;
      })
      .on("click", function(d) {
        focusOnNode(d, node, edgeLabelPath, distMatrix);
      });

    // TODO hardcoded the root here... a more sophisticated solution would determine the root(s)
    focusOnNode({ name: "A" }, node, edgeLabelPath, distMatrix);

    force.on("tick", function() {
      link.attr("d", function(d) {
        cola.vpsc.makeEdgeBetween(d, d.source.bounds, d.target.bounds, 28);
        var lineData = [
          { x: d.sourceIntersection.x, y: d.sourceIntersection.y },
          { x: d.arrowStart.x, y: d.arrowStart.y }
        ];
        return lineFunction(lineData);
      });

      node.attr("transform", function(d) {
        return "translate(" + d.x + "," + d.y + ")";
      });
    });
  });

var colorByDistance = d3.scale
  .ordinal()
  .domain([0, 5])
  .range(colorbrewer.RdBu[6]);

function focusOnPath(focusDep, link, distMatrix) {
  var shortestPath = distMatrix.path(focusedNode, focusDep);

  var inPath = function(d) {
    var intersection = shortestPath.filter(function(seg) {
      return (
        seg.source.name == d.source.name && seg.target.name == d.target.name
      );
    });
    return intersection.length > 0;
  };

  link
    .style("stroke", function(d) {
      return inPath(d) ? "magenta" : "#999";
    })
    .style("stroke-opacity", function(d) {
      return inPath(d) ? 1 : 0.6;
    });
}

function focusOnNode(focus, node, edgeLabelPath, distMatrix) {
  focusedNode = focus;

  var nodeColor = function(node) {
    var dist = distMatrix.dist(focus, node);
    return d3.rgb(
      dist == Infinity ? "#666" : colorByDistance(Math.min(dist, 4))
    );
  };

  node
    .selectAll("circle")
    .transition()
    .style("fill", nodeColor)
    .style("stroke", function(d) {
      return nodeColor(d).darker(2);
    });

  edgeLabelPath.text(function(d) {
    return '';(
      distMatrix.dist(focus, d.source) + distMatrix.dist(d.source, d.target)
    );
  });
}
