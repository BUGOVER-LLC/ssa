import { FETCH_LOGOUT } from '@/store/types/actions.type';

export default {
    name: 'NavbarComponent',

    props: ['activeMenu'],

    data() {
        return {
            isOpen: false,
        };
    },

    methods: {
        logout() {
            this.$store.dispatch(`authModule/${FETCH_LOGOUT}`).then();
            this.$router.push({ name: 'login' }).then();
        },
    },
};
