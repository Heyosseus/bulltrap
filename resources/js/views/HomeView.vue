    <template>
        <div class="">
            <navbar></navbar>
            <main-section></main-section>
        </div>
    </template>
    <script setup>
    import {ref} from 'vue';
    import {useAuthStore} from '../store/auth';
    import {useThemesStore} from "../store/themes.js";
    import {useRouter} from 'vue-router';


    import Login from "../components/Login.vue";
    import Navbar from "../components/Layout/Navbar.vue";
    import MainSection from "../components/MainSection.vue";

    </script>

