import { RouteRecordRaw } from 'vue-router';

const appIndex = (): object => import('@/views/app/AppIndex.vue');
const channelIndex = (): object => import('@/views/channel/ChannelIndex.vue');

export const routes: Array<RouteRecordRaw> = [
    {
        props: false,
        path: '/app/:appId',
        name: 'appBoard',
        component: appIndex,
        children: [
            {
                props: true,
                path: '/app/:appId/:channelId',
                name: 'channelBoard',
                component: channelIndex,
            },
        ],
    },
];
