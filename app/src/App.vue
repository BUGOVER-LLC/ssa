<template>
    <v-app class="app-content">
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

<style lang="scss" scoped>
.app-content {
    background-color: #28243d !important;
}
</style>
