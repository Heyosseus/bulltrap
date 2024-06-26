<template>
    <div class="">
        <div class="navbar bg-yellow-500 pl-20 ">
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
    </div>
</template>
<script setup>
import {ref} from 'vue';
import {useAuthStore} from '../store/auth';
import {useRouter} from 'vue-router';

import GithubIcon from "../icons/GithubIcon.vue";
import GoogleIcon from "../icons/GoogleIcon.vue";
import EmailIcon from "../icons/EmailIcon.vue";
import Login from "../components/Login.vue";


const appURL = import.meta.env.FRONTEND_URL;
const authStore = useAuthStore();
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
    document.documentElement.setAttribute('data-theme', theme);
}

</script>

