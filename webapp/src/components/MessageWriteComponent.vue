<template>
    <v-footer app height="72">
        <v-text-field
            bg-color="grey-lighten-1"
            class="overflow-hidden"
            density="compact"
            flat
            hide-details
            rounded="pill"
            variant="solo-filled"
        />
    </v-footer>
</template>

<script lang="ts">
import { Component, toNative, Vue } from 'vue-facing-decorator';

@Component({
    name: 'MessageWriteComponent',
})
class MessageWriteComponent extends Vue {}
export default toNative(MessageWriteComponent);
</script>

<style scoped lang="scss"></style>
