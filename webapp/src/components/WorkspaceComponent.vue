<template>
    <v-navigation-drawer color="grey-lighten-3" rail>
        <v-avatar class="d-block text-center mx-auto mt-4" color="grey-darken-1" size="36" />

        <v-divider class="mx-3 my-5" />

        <v-avatar v-for="n in 6" :key="n" class="d-block text-center mx-auto mb-9" color="grey-lighten-1" size="28" />
    </v-navigation-drawer>
</template>

<script lang="ts">
import { Component, toNative, Vue } from 'vue-facing-decorator';

@Component({
    name: 'WorkspaceComponent',
})
class WorkspaceComponent extends Vue {}
export default toNative(WorkspaceComponent);
</script>
