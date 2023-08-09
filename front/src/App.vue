<!-- @format -->

<template>
    <v-app>
        <loader-component v-if="displayLoader" />
        <v-main>
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
        ...mapGetters('notifyModule', {
            displayLoader: 'getDisplayLoader',
        }),
    },
};
</script>
