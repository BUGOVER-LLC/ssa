/** @format */

import { mdiApple, mdiEyeOffOutline, mdiEyeOutline, mdiGoogle } from '@mdi/js';

import httpAxios from '@/services/httpAxios.js';
import { ValidationObserver, ValidationProvider, extend, validate } from 'vee-validate';
import { email, max, min, required } from 'vee-validate/dist/rules';
import { FETCH_NOTIFY } from '@/store/types/actions.type';
import store from '@/store';

extend('email', email);
extend('min', min);
extend('max', max);
extend('required', required);

export default {
    name: 'RegisterModule',

    components: {
        ValidationProvider,
        ValidationObserver,
    },

    metaInfo() {
        return {
            title: this.$t('auth.register'),
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
            registerData: {
                username: '',
                email: '',
                password: '',
                agree: false,
            },
            errors: {
                username: false,
                email: false,
                password: false,
            },
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
            loginRules: {
                username: 'min:3|max:150|required',
                email: 'min:6|email|required|max:150',
                password: 'min:3|max:64|required',
            },
        };
    },

    methods: {
        register() {
            validate().then(valid => {
                if (valid) {
                    const self = this;

                    // Clear Errors
                    Object.keys(self.errors).forEach(key => {
                        self.errors[key] = false;
                    });

                    // Ajax Request
                    httpAxios({
                        url: `${this.$fullUrl}/auth/register`,
                        method: 'POST',
                        data: self.registerData,
                    }).then(() => {
                        Object.keys(self.registerData).forEach(key => {
                            self.registerData[key] = '';
                        });

                        store
                            .dispatch(`notifyModule/${FETCH_NOTIFY}`, {
                                displayLoader: false,
                                group: 'notify',
                                type: 'success',
                                title: self.$t('general.success'),
                                text: 'The process was successfully completed',
                            })
                            .then(() => setTimeout(() => self.$router.push({ name: 'login' }), 3000));
                    });
                }
            });
        },
    },
};
