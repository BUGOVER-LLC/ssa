/** @format */

// Import
import axios from 'axios';
import Vue from 'vue';
import store from '../store';

// Create
const service = axios.create({
    baseURL: process.env.VUE_APP_BACKEND_URL,
});

// Token
if (store.getters.getLoggedUser) {
    service.defaults.headers.common.Authorization = `Bearer ${store.getters.getLoggedUser.access_token}`;
}

// Request Interceptor
service.interceptors.request.use(
    config => {
        store.dispatch('displayLoader', true);

        return config;
    },
    error => {
        store.dispatch('displayLoader', false);

        return Promise.reject(error);
    },
);

// Response Interceptor
service.interceptors.response.use(
    response => {
        store.dispatch('displayLoader', false);

        return response;
    },
    error => {
        store.dispatch('displayLoader', false);

        let errors = error;

        if (error.response) {
            // Session Expired
            if (401 === error.response.status) {
                errors = error.response.data.message;
                store.dispatch('logOut');
            }

            // Errors from backend
            if (422 == error.response.status) {
                errors = '';

                for (const errorKey in error.response.data.errors) {
                    for (let i = 0; i < error.response.data.errors[errorKey].length; i++) {
                        errors += `${String(error.response.data.errors[errorKey][i])}<br>`;
                    }
                }
            }

            // Backend error
            if (500 === error.response.status) {
                errors = error.response.data.message;
            }

            // 404
            if (404 == error.response.status) {
                errors = 'Page not found';
            }
        }

        Vue.notify({
            group: 'notify',
            type: 'error',
            title: 'Error',
            text: String(errors),
        });

        return Promise.reject(error);
    },
);

// Export axios
export default service;
