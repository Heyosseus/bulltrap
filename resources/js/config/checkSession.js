import { useAuthStore } from '../store/auth.js'
import { useRouter } from 'vue-router'
import axios from "axios";
const router = useRouter()

export async function checkSession() {
    const authStore = useAuthStore();
    try {
        const response = await axios.get('/check-session');
        const isSessionActive = response.data.isSessionActive;
        if (isSessionActive) {
            authStore.setIsUserAuthenticated(true);
        } else {
            authStore.setIsUserAuthenticated(false);
        }
        return isSessionActive;
    } catch (error) {
        console.error('Error checking session:', error);
        authStore.setIsUserAuthenticated(false);
        return false;
    }
}
