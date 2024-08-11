<template>
    <dialog id="login_modal" class="modal">
        <div class="modal-box">
            <h3 class="text-4xl tracking-wider font-bold text-center">Bulltrap</h3>
            <div @click="authStore.setIsGoogleAuthenticated(true)">
                <a
                    href="/auth/google/redirect"
                    class="btn w-full flex items-center justify-center gap-4 mt-8"
                >
                    <google-icon></google-icon>
                    Sign in with Google
                </a>
            </div>
            <div @click="authStore.setIsGithubAuthenticated(true)">
                <a
                    href="/auth/github/redirect"
                    class="btn w-full flex items-center justify-center gap-4 mt-6"
                >
                    <github-icon></github-icon>
                    Sign in with Github
                </a>
            </div>
            <div class="divider">OR</div>
            <form action="" @submit.prevent="login">
                <label class="input input-bordered flex items-center gap-2 mt-4" id="email">
                    <email-icon></email-icon>
                    <input type="text" class="grow" name="email" v-model="email" placeholder="Email"
                           @focus="isPasswordShown = true"
                    />
                </label>
                <label v-if="isPasswordShown" class="input input-bordered flex items-center gap-2 mt-3">
                    <password-icon></password-icon>
                    <input type="password" class="grow" v-model="password" placeholder="********"/>
                </label>
                <button class="btn w-full btn-warning mx-auto mt-5" type="submit">Sign in with email</button>
            </form>
            <div class="flex items-center justify-between mt-6">
                <a href="#" class="text-sm text-gray-500">Forgot password?</a>
                <a @click="showRegisterModal" class="link link-info">Sign up</a>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button id="close">close</button>
        </form>
    </dialog>
    <Register></Register>
    <alerts></alerts>
</template>

<script setup>
import EmailIcon from "../icons/EmailIcon.vue";
import GoogleIcon from "../icons/GoogleIcon.vue";
import GithubIcon from "../icons/GithubIcon.vue";
import Register from "./Register.vue";
import Alerts from './Alerts/Alerts.vue'
import {useAlertStore} from '../store/alert';

import axios from "axios";
import {ref, nextTick} from "vue";
import {useAuthStore} from "../store/auth.js";
import PasswordIcon from "../icons/PasswordIcon.vue";
import router from "../router/index.js";

const authStore = useAuthStore();
const alertStore = useAlertStore();

const email = ref("");
const password = ref("");
const isPasswordShown = ref(false);

const closeModal = () => {
    const modal = document.getElementById('login_modal');
    if (modal) {
        modal.close();
    }
};

const login = async () => {
    try {
        const response = await axios.post("/login", {
            email: email.value,
            password: password.value,
        });
        authStore.setIsUserAuthenticated(true);
        alertStore.showAlert("Login successful!", "success");
        closeModal();
        await nextTick();
        await router.replace("/dashboard");
    } catch (error) {
        alertStore.showAlert("Login failed. Please try again.", "error");
        console.error(error);
    }
};

const showRegisterModal = () => {
    const modal = document.getElementById('register_modal');
    if (modal) {
        document.getElementById('close').click();
        modal.showModal();
    }
};
</script>
