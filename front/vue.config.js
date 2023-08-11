/** @format */

const path = require('path');
const fs = require('fs');
const { mergeSassVariables } = require('@vuetify/cli-plugin-utils');

module.exports = {
    pluginOptions: {
        i18n: {
            locale: process.env.VUE_APP_I18N_LOCALE,
            fallbackLocale: process.env.VUE_APP_I18N_FALLBACK_LOCALE,
            localeDir: 'locales',
            enableInSFC: false,
        },
    },

    transpileDependencies: ['vuetify'],
    chainWebpack: config => {
        config.module
            .rule('vue')
            .use('vue-loader')
            .tap(options => {
                return options;
            });
        config.resolve.alias.set('@', path.resolve(__dirname, 'src/'));

        const modules = ['vue-modules', 'vue', 'normal-modules', 'normal'];
        modules.forEach(match => {
            config.module
                .rule('sass')
                .oneOf(match)
                .use('sass-loader')
                .tap(opt => mergeSassVariables(opt, "'@/assets/style/variables.scss'"));
            config.module
                .rule('scss')
                .oneOf(match)
                .use('sass-loader')
                .tap(opt => mergeSassVariables(opt, "'@/assets/style/variables.scss';"));
        });
    },

    devServer: {
        https: {
            key: fs.existsSync(__dirname + process.env.CERT_KEY)
                ? fs.readFileSync(__dirname + process.env.CERT_KEY)
                : '',
            cert: fs.existsSync(__dirname + process.env.CERT_CRT)
                ? fs.readFileSync(__dirname + process.env.CERT_CRT)
                : '',
            port: 8080,
        },
        proxy: {
            '': {
                target: process.env.VUE_APP_BACKEND_URL,
                ws: true,
                changeOrigin: false,
            },
        },
    },
};
