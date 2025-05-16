<template>
    <v-main><!--  --></v-main>
</template>

<script lang="ts">
import { Component, toNative, Vue } from 'vue-facing-decorator';

@Component({
    name: 'MessageContentComponent',
})
class MessageContentComponent extends Vue {}
export default toNative(MessageContentComponent);
</script>

<style scoped lang="scss"></style>
