const Dotenv = require('dotenv-webpack');
const { VuetifyPlugin } = require('webpack-plugin-vuetify');

module.exports = {
    transpileDependencies: true,
    configureWebpack: {
        plugins: [new Dotenv(), new VuetifyPlugin()],
    },
    devServer: {
        proxy: 'http://localhost:888',
    },
};
