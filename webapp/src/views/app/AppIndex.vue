<template lang="html" src="./AppIndex.html" />
<script lang="ts">
import { Component, toNative, Vue } from 'vue-facing-decorator';

import AppBarComponent from '@/components/AppBarComponent.vue';
import ChannelsComponent from '@/components/ChannelsComponent.vue';
import MessageContentComponent from '@/components/MessageContentComponent.vue';
import MessageWriteComponent from '@/components/MessageWriteComponent.vue';
import RightBarComponent from '@/components/RightBarComponent.vue';
import SystemBarComponent from '@/components/SystemBarComponent.vue';
import WorkspaceComponent from '@/components/WorkspaceComponent.vue';

@Component({
    components: {
        MessageWriteComponent,
        RightBarComponent,
        MessageContentComponent,
        AppBarComponent,
        ChannelsComponent,
        WorkspaceComponent,
        SystemBarComponent,
    },
})
class AppIndex extends Vue {
    public beforeCreate(): void {
        if (26 === this.$route.params.appId.length) {
            return;
        }

        console.log('AppIndex created');
    }
}
export default toNative(AppIndex);
</script>
