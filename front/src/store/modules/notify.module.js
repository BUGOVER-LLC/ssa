/** @format */
import { FETCH_DISPLAY_LOADER } from '@/store/types/actions.type';
import { DISPLAY_LOADER } from '@/store/types/mutations.type';

const initialState = {
    displayLoader: false,
};

export const state = { ...initialState };

export const actions = {
    [FETCH_DISPLAY_LOADER](context, display) {
        context.commit('DISPLAY_LOADER', display);
    },
};
export const mutations = {
    [DISPLAY_LOADER](state, display) {
        state.displayLoader = display;
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
