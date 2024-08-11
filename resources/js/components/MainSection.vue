<template>
    <div class="bg-yellow-500 min-h-screen">
        <div class="h-screen"></div>
        <div class="image-container" v-lazy-load>
            <div class="spinner"></div> <!-- Optional spinner -->
            <img :data-src="photo" alt="Lazy loaded image">
        </div>
    </div>
</template>
<script setup>
import photo from '../../../public/assets/photo.jpg';
// import LazyLoadDirective from '../directives/LazyLoadDirective.js';

</script>

