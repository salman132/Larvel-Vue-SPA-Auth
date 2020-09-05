

require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue'
import routes from "./router/router"
import Welcome from "./components/Welcome";


import App from "./App.vue";
import Spinner from 'vue-simple-spinner'





new Vue({
    router:routes,
    components:{
      Welcome: Welcome,
      App: App,
      Spinner: Spinner
    },
    render: h =>h(App)
}).$mount('#app');
