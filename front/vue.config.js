/** @format */

const path = require('path');
const fs = require('fs');
const { mergeSassVariables } = require('@vuetify/cli-plugin-utils');

module.exports = {
    pluginOptions: {
        i18n: {
            locale: 'en',
            fallbackLocale: 'en',
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
            key: fs.existsSync(__dirname + '/.certs/ca.homestead.homestead.key')
                ? fs.readFileSync(__dirname + '/.certs/ca.homestead.homestead.key')
                : '',
            cert: fs.existsSync(__dirname + '/.certs/ca.homestead.homestead.crt')
                ? fs.readFileSync(__dirname + '/.certs/ca.homestead.homestead.crt')
                : '',
            port: 8080,
        },
    },
};
