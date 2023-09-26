/** @format */

import { mdiApple, mdiEyeOffOutline, mdiEyeOutline, mdiGoogle } from '@mdi/js';
import { ValidationObserver, ValidationProvider, extend, validate } from 'vee-validate';
import { email, max, min, required } from 'vee-validate/dist/rules';

import httpAxios from '@/services/httpAxios.js';
import { FETCH_LOGGED_USER } from '@/store/types/actions.type';
import store from '@/store';

extend('email', email);
extend('min', min);
extend('max', max);
extend('required', required);

export default {
    name: 'LoginModule',

    components: {
        ValidationProvider,
        ValidationObserver,
    },

    metaInfo() {
        return {
            title: this.$t('auth.login'),
        };
    },

    watch: {
        isPasswordVisible(val) {
            if (val) {
                setTimeout(() => {
                    this.isPasswordVisible = false;
                }, 1000);
            }
        },
    },

    data() {
        return {
            isPasswordVisible: false,
            socialLink: [
                {
                    icon: mdiApple,
                    color: '#818385',
                    colorInDark: '#dfe1e3',
                },
                {
                    icon: mdiGoogle,
                    color: '#db4437',
                    colorInDark: '#db4437',
                },
            ],
            icons: {
                mdiEyeOutline,
                mdiEyeOffOutline,
            },
            loginData: {
                email: '',
                password: '',
                remember: false,
            },
            errors: {
                email: false,
                password: false,
            },
            loginRules: {
                email: 'min:6|email|required|max:150',
                password: 'min:3|max:64|required',
                remember: 'required',
            },
        };
    },

    methods: {
        login() {
            validate().then(result => {
                if (result && result.valid) {
                    Object.keys(this.errors).forEach(key => {
                        this.errors[key] = false;
                    });

                    httpAxios({
                        url: `${this.$fullUrl}/auth/login`,
                        method: 'POST',
                        data: this.loginData,
                    }).then(response => {
                        store
                            .dispatch(`authModule/${FETCH_LOGGED_USER}`, response.data)
                            .then(() => this.$router.push({ name: 'adminDashboard' }).then());
                    });
                }
            });
        },
    },
};
