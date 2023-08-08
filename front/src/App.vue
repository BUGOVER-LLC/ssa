<!-- @format -->

<template>
    <v-app>
        <v-app-bar app color="primary" light>
            <div class="d-flex align-center">
                <v-img
                    alt="Vuetify Logo"
                    class="shrink mr-2"
                    contain
                    src="https://cdn.vuetifyjs.com/images/logos/vuetify-logo-dark.png"
                    transition="scale-transition"
                    width="40"
                />

                <v-img
                    alt="Vuetify Name"
                    class="shrink mt-1 hidden-sm-and-down"
                    contain
                    min-width="100"
                    src="https://cdn.vuetifyjs.com/images/logos/vuetify-name-dark.png"
                    width="100"
                />
            </div>

            <v-spacer />
        </v-app-bar>

        <v-main>
            <loader-component v-if="displayLoader" />

            <router-view />
        </v-main>
    </v-app>
</template>

<script>
import { mapGetters } from 'vuex';

import loaderComponent from '@/components/LoaderComponent';

export default {
    name: 'App',

    metaInfo() {
        return {
            title: this.$appName,
            titleTemplate: `%s - ${this.$appName}`,
        };
    },

    components: {
        loaderComponent,
    },

    computed: {
        ...mapGetters({
            displayLoader: 'getDisplayLoader',
        }),
    },
};
</script>
