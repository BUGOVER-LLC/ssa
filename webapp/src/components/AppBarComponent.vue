<template>
    <v-app-bar class="px-3" color="grey-lighten-4" flat height="72">
        <v-spacer />

        <v-responsive max-width="156">
            <v-text-field
                bg-color="grey-lighten-1"
                density="compact"
                flat
                hide-details
                rounded="pill"
                variant="solo-filled"
            />
        </v-responsive>
    </v-app-bar>
</template>

<script lang="ts">
import { Component, toNative, Vue } from 'vue-facing-decorator';

@Component({
    name: 'AppBarComponent',
})
class AppBarComponent extends Vue {}
export default toNative(AppBarComponent);
</script>

<style scoped lang="scss"></style>
