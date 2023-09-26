/** @format */

import Echo from 'laravel-echo';
import store from '@/store';

window.socket = require('socket.io-client');
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    wsPort: process.env.MIX_PUSHER_PORT,
    wssPort: process.env.MIX_PUSHER_PORT,
    forceTLS: process.env.MIX_PUSHER_TLS,
    wsHost: window.location.hostname,
    disableStats: true,
    enabledTransports: ['ws', 'wss'],
    disabledTransports: ['sockjs', 'xhr_polling', 'xhr_streaming'],
    namespace: 'Src.Broadcasting.Broadcast.Worker',
    encrypted: true,
    authEndpoint: '/app/worker/broadcasting/auth',
    transports: ['websocket', 'polling'],
    autoConnect: true,
    rejectUnauthorized: '-',
    perMessageDeflate: '-',
    auth: {
        headers: {
            Authorization: 'Bearer ' + store.getters.getLoggedUser.access_token,
        },
    },
});
