/** @format */
import { FETCH_DISPLAY_LOADER, FETCH_NOTIFY } from '@/store/types/actions.type';
import { DISPLAY_LOADER, NOTIFY } from '@/store/types/mutations.type';

const initialState = {
    displayLoader: false,
    group: 'notify',
    type: 'error',
    title: 'Error',
    text: '',
};

export const state = { ...initialState };

export const actions = {
    [FETCH_DISPLAY_LOADER](context, display) {
        context.commit(DISPLAY_LOADER, display);
    },
    [FETCH_NOTIFY](context, notify) {
        context.commit(NOTIFY, notify);
    },
};
export const mutations = {
    [DISPLAY_LOADER](state, display) {
        state.displayLoader = display;
    },
    [NOTIFY](state, notify) {
        state.displayLoader = notify;
    },
};
export const getters = {
    getDisplayLoader(state) {
        return state.displayLoader;
    },
};

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters,
};
