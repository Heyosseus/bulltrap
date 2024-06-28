import { createApp } from 'vue';
import router from "./router/index.js";
import App from "./App.vue";
import {createPinia} from "pinia";
import {useThemesStore} from "./store/themes.js";

const pinia = createPinia()
const app = createApp(App);
app.use(router);
app.use(pinia);
app.mount('#app');

const themesStore = useThemesStore();
document.documentElement.setAttribute('data-theme', themesStore.getTheme);
