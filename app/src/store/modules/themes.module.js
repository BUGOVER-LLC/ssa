import { FETCH_DARK_MODE } from '@/store/types/actions.type';
import { DARK_MODE } from '@/store/types/mutations.type';

const initialState = {
    dark: true,
};
export const state = { ...initialState };

export const actions = {
    [FETCH_DARK_MODE](context, mode) {
        context.commit(DARK_MODE, mode);
    },
};
export const mutations = {
    [DARK_MODE](state, mode) {
        state.dark = mode;
    },
};
export const getters = {
    getDisplayThemes(state) {
        return state.dark;
    },
};

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters,
};
