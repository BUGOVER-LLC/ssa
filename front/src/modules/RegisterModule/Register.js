/** @format */

import httpAxios from '@/services/httpAxios.js';
import { mdiEyeOffOutline, mdiEyeOutline, mdiFacebook, mdiGithub, mdiGoogle, mdiTwitter } from '@mdi/js';

export default {
    name: 'RegisterModule',

    metaInfo() {
        return {
            title: this.$t('auth.register'),
        };
    },

    data() {
        return {
            isPasswordVisible: false,
            registerData: {
                first_name: '',
                last_name: '',
                email: '',
                password: '',
                agree: false,
            },
            errors: {
                first_name: false,
                last_name: false,
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
        };
    },

    methods: {
        register() {
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
        },
    },
};
