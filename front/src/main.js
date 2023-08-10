/** @format */

// Import
import Vue from 'vue';
import VueMeta from 'vue-meta';

import App from './App.vue';
import i18n from './locales';
import vuetify from './plugins/vuetify';
import router from './router';
import store from './store';

// Register layouts
Vue.component('AuthLayout', () => import('./layouts/auth.vue'));
Vue.component('GreetingLayout', () => import('./layouts/greeting.vue'));
Vue.component('AdminLayout', () => import('./layouts/admin.vue'));

// Config
Vue.prototype.$backendUrl = process.env.VUE_APP_BACKEND_URL;

// Prototype
Vue.prototype.$backendVersion = process.env.VUE_APP_BACKEND_VERSION;
Vue.prototype.$appName = process.env.VUE_APP_NAME;
Vue.prototype.$fullUrl = process.env.VUE_APP_BACKEND_URL + process.env.VUE_APP_BACKEND_VERSION;
Vue.config.productionTip = false;

// Used plugin
Vue.use(VueMeta);

// Start Vue Js Instance
new Vue({
    el: '#app',
    router,
    i18n,
    store,
    vuetify,
    render: h => h(App),
}).$mount('#app');
