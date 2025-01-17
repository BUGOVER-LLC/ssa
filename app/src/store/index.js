import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import authModule from '@/store/modules/auth.module';
import notifyModule from '@/store/modules/notify.module';
import themeModule from '@/store/modules/themes.module';

export default new Vuex.Store({
    strict: 'production' !== process.env.NODE_ENV,
    devtools: 'production' !== process.env.NODE_ENV,
    modules: {
        authModule,
        notifyModule,
        themeModule,
    },
});
