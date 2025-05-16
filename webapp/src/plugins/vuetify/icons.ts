import '@mdi/font/css/materialdesignicons.min.css';

import type { IconAliases, IconProps } from 'vuetify';

const aliases: Partial<IconAliases> = {
    info: 'ri-error-warning-line',
    success: 'ri-checkbox-circle-line',
    warning: 'ri-alert-line',
    error: 'ri-error-warning-line',
    calendar: 'ri-calendar-2-line',
    complete: 'ri-check-line',
    close: 'ri-close-line',
    delete: 'ri-close-circle-fill',
    clear: 'ri-close-line',
    prev: 'ri-arrow-left-s-line',
    next: 'ri-arrow-right-s-line',
    delimiter: 'ri-circle-line',
    expand: 'ri-arrow-down-s-line',
    menu: 'ri-menu-line',
    subgroup: 'ri-arrow-down-s-fill',
    dropdown: 'ri-arrow-down-s-line',
    edit: 'ri-pencil-line',
    ratingEmpty: 'ri-star-line',
    ratingFull: 'ri-star-fill',
    ratingHalf: 'ri-star-half-line',
    loading: 'ri-refresh-line',
    first: 'ri-skip-back-mini-line',
    last: 'ri-skip-forward-mini-line',
    unfold: 'ri-split-cells-vertical',
    file: 'ri-attachment-2',
    plus: 'ri-add-line',
    minus: 'ri-subtract-line',
    sortAsc: 'ri-arrow-up-line',
    sortDesc: 'ri-arrow-down-line',
};
/* eslint-enable */

export const iconify = {
    component: (props: IconProps) => {
        return h(props.tag, {
            ...props,

            // As we are using class based icons
            class: [props.icon],

            // Remove used props from DOM rendering
            tag: undefined,
            icon: undefined,
        });
    },
};

export const icons = {
    defaultSet: 'mdi',
    aliases,
    sets: {
        iconify,
    },
};
