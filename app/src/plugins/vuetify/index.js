import 'vuetify/dist/vuetify.min.css';

import Vue from 'vue';
import Vuetify from 'vuetify/lib/framework';

import state from '@/store';

import preset from './default-preset/preset';

Vue.use(Vuetify);

export default new Vuetify({
    preset,
    theme: {
        dark: state.getters['themeModule/getDisplayThemes'],
        options: {
            customProperties: true,
            variations: false,
        },
    },
    treeShake: true,
    icons: {
        iconfont: 'mdiSvg',
    },
    lang: {
        current: 'en',
    },
});
