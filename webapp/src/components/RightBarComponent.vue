<template>
    <v-navigation-drawer location="right">
        <v-list>
            <v-list-item v-for="n in 5" :key="n" :title="`Item ${n}`" link></v-list-item>
        </v-list>
    </v-navigation-drawer>
</template>

<script lang="ts">
import { Component, toNative, Vue } from 'vue-facing-decorator';

@Component({
    name: 'RightBarComponent',
})
class RightBarComponent extends Vue {}
export default toNative(RightBarComponent);
</script>

<style scoped lang="scss"></style>
