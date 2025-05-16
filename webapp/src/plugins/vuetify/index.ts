import 'vuetify/styles';

import { createVuetify } from 'vuetify';
import { VBtn } from 'vuetify/components/VBtn';

import defaults from './defaults';
import { icons } from './icons';
import { themes } from './theme';

export default createVuetify({
    aliases: {
        IconBtn: VBtn,
    },
    defaults,
    icons,
    theme: {
        defaultTheme: 'light',
        themes,
    },
});
