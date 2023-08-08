<!-- @format -->

<template>
    <div class="bg-gray-100 font-family-karla flex">
        <sidebar-component :active-menu="activeMenu" />

        <div class="w-full flex flex-col h-screen overflow-y-hidden">
            <navbar-component />
            <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
                <main class="w-full flex-grow p-6">
                    <slot></slot>
                </main>
                <footer class="w-full bg-white text-right p-4">
                    {{ $t('general.copyright') }} © {{ new Date().getFullYear() }}.
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
import navbarComponent from '@/components/NavbarComponent';
import sidebarComponent from '@/components/SidebarComponent';

export default {
    name: 'AdminLayout',

    components: {
        sidebarComponent,
        navbarComponent,
    },

    props: {
        activeMenu: {
            required: true,
            type: Array,
        },
    },
};
</script>
