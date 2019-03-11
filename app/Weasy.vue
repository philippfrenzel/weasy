<template>
  <div id="weasy">
  <v-navigation-drawer
    v-model="drawer"
    class="pb-0"
    floating
    hide-overlay
    stateless
    width="380"
  > 
    <v-layout fill-height>
      <v-navigation-drawer
        dark
        mini-variant
        stateless
        value="true"
      >

        <v-toolbar flat class="transparent">
            <v-list class="pa-0">
                <v-list-tile avatar>
                <v-list-tile-avatar>
                    <img src="https://randomuser.me/api/portraits/men/85.jpg">
                </v-list-tile-avatar>

                <v-list-tile-content>
                    <v-list-tile-title>John Leider</v-list-tile-title>
                </v-list-tile-content>

                <v-list-tile-action>
                    <v-btn
                    icon
                    @click.native.stop="mini = !mini"
                    >
                    <v-icon>chevron_left</v-icon>
                    </v-btn>
                </v-list-tile-action>
                </v-list-tile>
            </v-list>
        </v-toolbar>

        <header-component />
      </v-navigation-drawer>
    </v-layout>
  </v-navigation-drawer>

    Hello Buchi!

  </div>
</template>

<script>
import HeaderComponent from './components/HeaderComponent'


export default {
    name: 'Weasy',
    components: {
        HeaderComponent
    },
    data: () => ({
      drawer: null,
      drawerRight: null,
      right: false,
      left: true
    }),
    props: {
      source: String
    }
}
</script>
