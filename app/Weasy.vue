<template>
  <div id="weasy">
  
  <v-navigation-drawer app>
    <header-component />
  </v-navigation-drawer>
  
  <v-toolbar app></v-toolbar>
    

  <v-content>
    <v-container fluid>
      <router-view></router-view>
    </v-container>
  </v-content>
  
  <v-footer app></v-footer>

  </div>
</template>

<script>
import HeaderComponent from './components/HeaderComponent'
import router from './routes.js'

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
