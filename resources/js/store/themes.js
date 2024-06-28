import { defineStore } from 'pinia';

export const useThemesStore = defineStore('themes', {
    state: () => ({
        theme: localStorage.getItem('theme') || 'dark', // Retrieve theme from localStorage or default to 'dark'
    }),
    actions: {
        setTheme(value) {
            this.theme = value;
            localStorage.setItem('theme', value); // Store the theme in localStorage
            document.documentElement.setAttribute('data-theme', value); // Update the data-theme attribute
        },
    },
    getters: {
        getTheme: (state) => state.theme,
    },
});
