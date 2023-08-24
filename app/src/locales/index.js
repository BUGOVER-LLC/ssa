/** @format */

// Import
import Vue from 'vue';
import VueI18n from 'vue-i18n';

// Config
Vue.use(VueI18n);

// Load messages
const messages = {
    en: {
        navbar: require('./en/navbar.json'),
        general: require('./en/general.json'),
        auth: require('./en/auth.json'),
        notFound: require('./en/404-not-found.json'),
    },
    ru: {},

    // Other languages...
};

// Export VueI18n
export default new VueI18n({
    locale: process.env.VUE_APP_I18N_LOCALE || 'en',
    fallbackLocale: process.env.VUE_APP_I18N_FALLBACK_LOCALE || 'en',
    messages,
});
