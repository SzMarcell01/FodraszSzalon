<template>
<div class="h-screen">
    <div id="gallery" class="max-w-7xl mx-auto px-5">
      <h2 class="text-4xl font-serif text-[#4a2c40] mb-10">Tekintsd meg munkáinkat</h2>
    </div>

    <div class="flex snap-x snap-mandatory overflow-x-scroll p-10">
      <BaseCard v-for="imgUrl in images" :key="imgUrl" :imagePath="imgUrl" />
    </div>
</div>
</template>

<script setup>
import BaseCard from './BaseCard.vue';

// 1. Beolvassuk a modulokat
const modules = import.meta.glob('/public/model/*.JPG', { eager: true, import: 'default' });

// 2. Kigyűjtjük az útvonalakat és levágjuk a '/public' részt az elejéről
const images = Object.values(modules).map(path => path.replace('/public', ''));
</script>