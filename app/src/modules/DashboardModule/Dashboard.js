export default {
    name: 'DashboardModule',

    metaInfo() {
        return {
            title: this.$t('navbar.dashboard'),
        };
    },

    beforeCreate() {
        this.$router.push({ name: 'login' }).then(result => {});
    },
};
