import './registerServiceWorker';
import '@/common/bootstrap';

import { App, createApp } from 'vue';

import AppLayout from './App.vue';
import i18n from './plugins/i18n';
import vuetify from './plugins/vuetify';
import router from './router';
import store from './store';

const app: App<Element> = createApp(AppLayout);

app.use(store);
app.use(router);
app.use(vuetify);
app.use(i18n);

app.mount('#app');
