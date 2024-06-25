<template>
    <div class="">
        <div class="navbar bg-yellow-500 px-20 ">
            <div class="flex-1">
                <a class="text-black text-4xl">Bulltrap</a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal">
                    <li>
                        <div onclick="my_modal_2.showModal()" class="text-md btn btn-neutral text-white">Log in</div>
                    </li>
                    <dialog id="my_modal_2" class="modal">
                        <div class="modal-box">
                            <h3 class="text-3xl tracking-wider font-bold text-center">Bulltrap</h3>
                            <div @click="authStore.setIsGoogleAuthenticated(true)">
                                <a
                                    href="/auth/google/redirect"
                                    class="btn btn-neutral w-full flex items-center justify-center gap-4 mt-6"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"
                                         class="h-7 w-7 opacity-70">
                                        <path
                                            d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"
                                        />
                                    </svg>
                                    Sign in with Google
                                </a>
                            </div>
                            <div class="divider">OR</div>
                            <label class="input input-bordered flex items-center gap-2 mt-4">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 16 16"
                                    fill="currentColor"
                                    class="h-4 w-4 opacity-70">
                                    <path
                                        d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z"/>
                                    <path
                                        d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z"/>
                                </svg>
                                <input type="text" class="grow" placeholder="Email"/>
                            </label>
                            <button class="btn w-full btn-warning mx-auto mt-5 ">Sign in with email</button>
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                </ul>
            </div>
        </div>
    </div>
</template>
<script setup>
import {ref} from 'vue';

const appURL = import.meta.env.FRONTEND_URL;

</script>
