/** @format */

// Import
import Vue from 'vue';
import App from './App.vue';
import i18n from './locales';
import router from './router';
import store from './store';
import vuetify from './plugins/vuetify';
import VueMeta from 'vue-meta';

// Register layouts
const authLayout = () => import('./layouts/auth');
const adminLayout = () => import('./layouts/admin');
Vue.component('AuthLayout', authLayout);
Vue.component('AdminLayout', adminLayout);

// Config
Vue.config.productionTip = false;
Vue.prototype.$backendUrl = process.env.VUE_APP_BACKEND_URL;
Vue.prototype.$appName = process.env.VUE_APP_NAME;
Vue.use(VueMeta);

// Start Vue Js Instance
new Vue({
    el: '#app-boss',
    router,
    i18n,
    store,
    vuetify,
    render: h => h(App),
}).$mount('#app-boss');
