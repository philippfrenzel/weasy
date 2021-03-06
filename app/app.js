import router from './routes.js'
import Weasy from './Weasy'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'vuetify/dist/vuetify.min.css'

require('./bootstrap');

window.Vue = require('vue');

window.app = new Vue({
    el: '#app',
    components: {
        Weasy
    },
    router,
    data: {

    },
    methods: {
        isActiveMenu(path) {
            return window.location.pathname == path;
        }
    }
});
