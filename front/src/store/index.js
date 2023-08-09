/** @format */

import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import authModule from '@/store/modules/auth.module';
import notifyModule from '@/store/modules/notify.module';

export default new Vuex.Store({
    strict: true,
    modules: {
        authModule,
        notifyModule,
    },
});
