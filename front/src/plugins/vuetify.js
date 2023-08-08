/** @format */

import Vue from 'vue';
import Vuetify from 'vuetify/lib/framework';
import 'vuetify/dist/vuetify.min.css';

Vue.use(Vuetify);

export default new Vuetify({
    theme: {
        dark: true,
        themes: {
            dark: {
                primary: '#1EB980',
                secondary: '#045D56',
                tertiary: '#FF6859',
                quaternary: '#FFCF44',
                quinary: '#B15DFF',
                senary: '#72DEFF',
            },
        },
    },
    customVariables: ['@/assets/sass/main.sass'],
    treeShake: true,
    icons: {
        iconfont: 'mdiSvg',
    },
    lang: {
        current: 'en',
    },
});
