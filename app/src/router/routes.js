const dashboardModule = () => import('@/modules/DashboardModule');
const error404Module = () => import('@/modules/Error404Module');
const loginModule = () => import('@/modules/LoginModule');
const registerModule = () => import('@/modules/RegisterModule');
const selectFarm = () => import('@/modules/SelectFarmModule');
const message = () => import('@/modules/DashboardModule/Messages/Message');

export default [
    // Home Page
    { path: '/', redirect: '/login' },

    // Auth
    { path: '/login', name: 'login', component: loginModule, meta: { guest: true } },
    { path: '/register', name: 'register', component: registerModule, meta: { guest: true } },

    // Farm select
    { path: '/farms', name: 'selectFarm', component: selectFarm, meta: { guest: false } },

    // Admin
    {
        path: '/admin',
        name: 'admin',
        component: dashboardModule,
        meta: { auth: true },
        children: [
            {
                path: 'dashboard',
                name: 'adminDashboard',
                component: message,
            },
        ],
    },

    // Errors
    { path: '*', component: error404Module },
];
