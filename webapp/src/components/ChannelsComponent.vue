<template>
    <v-navigation-drawer width="244">
        <v-sheet color="grey-lighten-5" height="128" width="100%"></v-sheet>

        <v-list>
            <v-list-item v-for="n in 5" :key="n" :title="`Item ${n}`" link></v-list-item>
        </v-list>
    </v-navigation-drawer>
</template>

<script lang="ts">
import { Component, toNative, Vue } from 'vue-facing-decorator';

@Component({
    name: 'ChannelsComponent',
})
class ChannelsComponent extends Vue {}
export default toNative(ChannelsComponent);
</script>

<style scoped lang="scss"></style>
