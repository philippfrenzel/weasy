<template>
    <div id="header-component">
        <v-list class="pt-0" dense>
          <v-divider></v-divider>
          
        <v-list-tile
            v-for="item in items"
            :key="item.title"
            @click=""
        >
            <v-list-tile-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-tile-action>

            <v-list-tile-content>
              <v-list-tile-title>{{ item.title }}</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </v-list>
    </div>
</template>

<script>

export default {
    name: 'HeaderComponent',
    data() {
        return {
            items: [
                { title: 'Foo', icon: ''},
                { title: 'Bar', icon: '' }
            ]
        }
    }
}

</script>