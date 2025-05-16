<template>
    <v-system-bar>
        <v-spacer></v-spacer>

        <v-icon>mdi-square</v-icon>

        <v-icon>mdi-circle</v-icon>

        <v-icon>mdi-triangle</v-icon>
    </v-system-bar>
</template>

<script lang="ts">
import { Component, toNative, Vue } from 'vue-facing-decorator';

@Component({
    name: 'SystemBarComponent',
})
class SystemBarComponent extends Vue {}
export default toNative(SystemBarComponent);
</script>

<style scoped lang="scss"></style>
