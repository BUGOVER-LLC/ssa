/** @format */

import { mdiEyeOffOutline, mdiEyeOutline, mdiFacebook, mdiGithub, mdiGoogle, mdiTwitter } from '@mdi/js';

import httpAxios from '@/services/httpAxios.js';
import { ValidationObserver, ValidationProvider, extend, validate } from 'vee-validate';
import { email, max, min, required } from 'vee-validate/dist/rules';

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
                    icon: mdiFacebook,
                    color: '#4267b2',
                    colorInDark: '#4267b2',
                },
                {
                    icon: mdiTwitter,
                    color: '#1da1f2',
                    colorInDark: '#1da1f2',
                },
                {
                    icon: mdiGithub,
                    color: '#272727',
                    colorInDark: '#fff',
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
                        url: `${this.$backendUrl}register`,
                        method: 'POST',
                        data: self.registerData,
                    }).then(() => {
                        Object.keys(self.registerData).forEach(key => {
                            self.registerData[key] = '';
                        });

                        self.$notify({
                            group: 'notify',
                            type: 'success',
                            title: self.$t('general.success'),
                            text: 'The process was successfully completed',
                        });

                        setTimeout(() => self.$router.push({ name: 'login' }), 3000);
                    });
                }
            });
        },
    },
};
