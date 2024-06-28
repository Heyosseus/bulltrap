<template>
    <div class="">
        <div class="navbar bg-yellow-500 px-20 ">
            <div class="flex-1">
                <a href="/" class="text-black text-4xl">Bulltrap</a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal items-center">

                    <li class="text-neutral bg-none">
                        <details>
                            <summary class="">Menu</summary>
                            <ul class="text-primary rounded-t-none p-2">
                                <li>
                                    <a class="text-md text-primary">
                                       Profile
                                    </a>
                                </li>
                                <li>
                                    <a @click="logout" class="text-md text-error">
                                        Logout
                                    </a>
                                </li>
                                <li>

                                </li>
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
import Login from "../components/Login.vue"
import {useAuthStore} from "../store/auth.js";
import {ref} from "vue";
import axios from "axios";
import router from "../router/index.js";

const authStore = useAuthStore();
const logout = async () => {
    try {
        const response = await axios.post('/logout');
        authStore.setIsUserAuthenticated(false);
        await router.push('/');
    } catch (error) {
        console.error(error);
    }
};


</script>
