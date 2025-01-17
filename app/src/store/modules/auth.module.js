import { FETCH_LOGGED_USER, FETCH_LOGOUT } from '@/store/types/actions.type';
import { LOGGED_USER, REMOVE_LOGGED_USER } from '@/store/types/mutations.type';

const cookieItem = 'loggedUser';

const initialState = {
    loggedUser: localStorage.getItem(cookieItem) || null,
};

export const state = { ...initialState };

export const actions = {
    [FETCH_LOGGED_USER](context, user) {
        context.commit(LOGGED_USER, user);
    },

    [FETCH_LOGOUT](context) {
        context.commit(REMOVE_LOGGED_USER);
    },
};
export const mutations = {
    [LOGGED_USER](state, user) {
        const now = new Date();
        const expiryDate = new Date();
        user.expiryDate = expiryDate.setTime(now.getTime() + user.expires_in * 1000);

        const userParse = JSON.stringify(user);
        localStorage.setItem(cookieItem, userParse);
        state.loggedUser = userParse;
    },

    [REMOVE_LOGGED_USER](state) {
        state.loggedUser = null;
        localStorage.removeItem(cookieItem);
    },
};
export const getters = {
    getLoggedUser(state) {
        let user = state.loggedUser;
        if (user) {
            user = JSON.parse(user);
        }
        return user;
    },
};

export default {
    namespaced: true,
    state,
    actions,
    mutations,
    getters,
};
