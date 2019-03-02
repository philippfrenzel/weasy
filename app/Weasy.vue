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
        <v-footer app>
        </v-footer>
    </div>
</template>

<script>
import HeaderComponent from './components/HeaderComponent'

export default {
    name: 'Weasy',
    components: {
        HeaderComponent
    }
}
</script>
