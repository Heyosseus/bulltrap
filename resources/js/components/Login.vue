<template>                    <dialog id="login_modal" class="modal">
    <div class="modal-box">
        <h3 class="text-4xl tracking-wider font-bold text-center ">Bulltrap</h3>
        <div @click="authStore.setIsGoogleAuthenticated(true)">
            <a
                href="/auth/google/redirect"
                class="btn  w-full flex items-center justify-center gap-4 mt-8"
            >
                <google-icon></google-icon>
                Sign in with Google
            </a>
        </div>
        <div @click="authStore.setIsGithubAuthenticated(true)">
            <a
                href="/auth/github/redirect"
                class="btn  w-full flex items-center justify-center gap-4 mt-6"
            >
                <github-icon></github-icon>
                Sign in with Github
            </a>
        </div>
        <div class="divider">OR</div>
        <label class="input input-bordered flex items-center gap-2 mt-4">
            <email-icon></email-icon>
            <input type="text" class="grow" placeholder="Email"/>
        </label>
        <button class="btn w-full btn-warning mx-auto mt-5 ">Sign in with email</button>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
</template>
<script setup lang="ts">
import EmailIcon from "../icons/EmailIcon.vue";
import GoogleIcon from "../icons/GoogleIcon.vue";
import GithubIcon from "../icons/GithubIcon.vue";


import { useAuthStore } from "../store/auth.js";

const authStore = useAuthStore();
</script>
