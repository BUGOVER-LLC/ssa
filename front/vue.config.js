/** @format */

const path = require('path');
const fs = require('fs');

module.exports = {
    pluginOptions: {
        i18n: {
            locale: 'en',
            fallbackLocale: 'en',
            localeDir: 'locales',
            enableInSFC: false,
        },
    },

    chainWebpack: config => {
        config.module
            .rule('vue')
            .use('vue-loader')
            .tap(options => {
                return options;
            });
        config.resolve.alias.set('@', path.resolve(__dirname, 'src/'));
    },

    transpileDependencies: ['vuetify'],

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

    // css: {
    //     loaderOptions: {
    //         sass: {
    //             data: '@import "@/assets/sass/main.sass"',
    //         },
    //     },
    // },
};
