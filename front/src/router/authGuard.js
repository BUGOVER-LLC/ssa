/** @format */

import store from '@/store';
import router from '@/router/index';

// Middlewares
router.beforeEach((to, from, next) => {
    // Redirect to route
    const redirectToRoute = function (name) {
        if (name === from.name) {
            next();
            return;
        }

        next({ name });
    };

    // Get logged user
    const loggedUser = store.getters.getLoggedUser;

    // Check if access token expired
    if (loggedUser) {
        const currentDateTime = new Date().getTime();
        if (currentDateTime > loggedUser.expiryDate) {
            store.dispatch('logOut');
            return redirectToRoute('login');
        }
    }

    // Auth
    if (to.meta.auth) {
        if (loggedUser) return next();
        else return redirectToRoute('login');
    }

    // Guest
    if (to.meta.guest) {
        if (loggedUser) return redirectToRoute('adminDashboard');
        else return next();
    }

    next();
});
