
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */
import Material from "material-design-lite";
import 'element-ui/lib/theme-default/index.css';
import "../css/styles.css";
import "../css/material.min.css";
import "../css/modal.css";
// import "../css/material-design.min.css";

import "../css/toastr.min.css";
import "../css/post-module.css";
import ElementUI from 'element-ui';
import VueRouter from 'vue-router';
import App from './App.vue';
import Shequ from './components/Shequ.vue';
import Index from './components/Index.vue';
// import Authorized from './components/passport/AuthorizedClients.vue';
// import Clients from './components/passport/Clients.vue.vue';
// import PersonalAccess from './components/passport/PersonalAccessTokens.vue';
import Login from './components/Login.vue';
import Zhuanlan from './components/Zhuanlan.vue';
import Wenda from './components/Wenda.vue';
Vue.use(ElementUI);
Vue.use(VueRouter);
Vue.use(Material);


const routes = [
    { path: '/shequ', component: Shequ },
    { path: '/index', component:Index},
    { path: '/login',component:Login},
    { path: '/zhuanlan',component:Zhuanlan},
    { path: '/wenda',component:Wenda},
     { path: '/', redirect: '/index'},
]
const router = new VueRouter({
    routes
});
const app = new Vue({
  el: '#app',
  router,
  render: h => h(App),
    data: {
        total: 0
    },
    methods: {
        incrementTotal: function () {
            this.total += 1
        }
    }
}).$mount('#app');

