<template>
    <div v-if="message" :class="`alert absolute top-20 right-4 w-1/5 ${alertTypeClass}`" role="alert">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 shrink-0 stroke-current"
            fill="none"
            viewBox="0 0 24 24">
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ message }}</span>
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { useAlertStore } from '../../store/alert.js';

const alertStore = useAlertStore();

const message = computed(() => alertStore.message);
const alertTypeClass = computed(() => alertStore.type === 'success' ? 'alert-success' : 'alert-error');
</script>
