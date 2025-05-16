declare module 'vuetify/lib/framework' {
    import Vuetify from 'vuetify';
    // noinspection JSUnusedGlobalSymbols
    export default Vuetify;
}

declare module '*.vue' {
    import type { DefineComponent } from 'vue';
    const component: DefineComponent<{}, {}, any>;
    // noinspection JSUnusedGlobalSymbols
    export default component;
}
