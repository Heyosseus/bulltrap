<template>
    <dialog id="register_modal" class="modal">
        <form @submit.prevent="register" class="modal-box space-y-7">
            <h3 class="text-4xl tracking-wider font-bold text-center ">Bulltrap</h3>

            <label class="input input-bordered flex items-center gap-2 mt-4">
                <email-icon></email-icon>
                <input type="text" class="grow" v-model="email" placeholder="Email"/>
            </label>

            <label class="input input-bordered flex items-center gap-2">
                <username-icon></username-icon>
                <input type="text" class="grow" v-model="username" placeholder="Username"/>
            </label>
            <label class="input input-bordered flex items-center gap-2">
                <password-icon></password-icon>
                <input type="password" class="grow" v-model="password" placeholder="********"/>
            </label>

            <button class="btn w-full btn-warning mx-auto mt-5" type="submit">Register</button>

            <div class="flex items-center justify-between mt-6">
                <span  class="text-sm text-gray-500">Already have an account?</span>
                <a @click="showLoginModal" class="link link-info">Sign in</a>
            </div>
        </form>
        <form method="dialog" class="modal-backdrop">
            <button id="reg_close">close</button>
        </form>
    </dialog>
</template>
<script setup>
import EmailIcon from "../icons/EmailIcon.vue";
import UsernameIcon from "../icons/UsernameIcon.vue";
import PasswordIcon from "../icons/PasswordIcon.vue";
import axios from "axios";
import {ref} from "vue";
import {useAuthStore} from "../store/auth.js";

const authStore = useAuthStore();

const email = ref('');
const username = ref('');
const password = ref('');

const register = async () => {
    try {
        const response = await axios.post('/register', {
            email: email.value,
            name: username.value,
            password: password.value
        });
        console.log(response.data);
    } catch (error) {
        console.error(error);
    }
};


const showLoginModal = () => {
    const modal = document.getElementById('login_modal');
    if (modal) {
        document.getElementById('reg_close').click();
        modal.showModal();
    }
};

</script>
