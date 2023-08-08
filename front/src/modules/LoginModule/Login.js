/** @format */

import httpAxios from '@/services/httpAxios.js';
import { mdiFacebook, mdiTwitter, mdiGithub, mdiGoogle, mdiEyeOutline, mdiEyeOffOutline } from '@mdi/js';

export default {
    name: 'LoginModule',

    metaInfo() {
        return {
            title: this.$t('auth.login'),
        };
    },

    data() {
        return {
            isPasswordVisible: false,
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
            loginData: {
                email: '',
                password: '',
                remember: false,
            },
            errors: {
                email: false,
                password: false,
            },
        };
    },

    methods: {
        login() {
            const self = this;

            // Clear Errors
            Object.keys(this.errors).forEach(key => {
                self.errors[key] = false;
            });

            // Ajax Request
            httpAxios({
                url: `${this.$backendUrl}login`,
                method: 'POST',
                data: self.loginData,
            }).then(response => {
                self.$store.commit('LOGGED_USER', response.data);

                self.$router.push({ name: 'adminDashboard' });
            });
        },
    },
};
