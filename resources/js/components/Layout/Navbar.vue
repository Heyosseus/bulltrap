<template>
    <div class="navbar bg-yellow-500 pl-20 fixed">
        <div class="flex-1">
            <a class="text-black text-4xl">Bulltrap</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal items-center">
                <li>
                    <div v-if="authStore.isUserAuthenticated" @click="goToDashboard"
                         class="text-md btn btn-neutral text-white">
                        Dashboard
                    </div>
                    <div v-else @click="showLoginModal" class="text-md btn btn-neutral text-white">
                        Log in
                    </div>
                </li>
                <li class="text-neutral bg-none">
                    <details>
                        <summary class="">Themes</summary>
                        <ul class="text-primary rounded-t-none p-2">
                            <li><a @click="changeTheme('dark')">Dark</a></li>
                            <li><a @click="changeTheme('light')">Light</a></li>
                            <li><a @click="changeTheme('acid')">Acid</a></li>
                            <li><a @click="changeTheme('cupcake')">Cupcake</a></li>
                        </ul>
                    </details>
                </li>
                <login></login>
            </ul>
        </div>
    </div>

</template>
<script setup>
import {useAuthStore} from "../../store/auth.js";
import Login from "../Login.vue";
import {useThemesStore} from "../../store/themes.js";
import {useRouter} from "vue-router";

const appURL = import.meta.env.FRONTEND_URL;
const authStore = useAuthStore();
const themesStore = useThemesStore();
const router = useRouter();

const showLoginModal = () => {
    const modal = document.getElementById('login_modal');
    if (modal) {
        modal.showModal();
    }
};

const goToDashboard = () => {
    router.push('/dashboard');
};

const changeTheme = (theme) => {
    themesStore.setTheme(theme);
}

</script>
