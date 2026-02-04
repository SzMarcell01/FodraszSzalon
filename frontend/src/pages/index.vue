<template>
  <BaseLayout>
    <div class="max-w-7xl mx-auto px-5 mt-10">
      <h2 class="text-4xl font-serif text-[#4a2c40] mb-10">Tekintsd meg munkáinkat</h2>
    </div>

    <div class="w-full overflow-hidden">
      <div class="flex gap-6 overflow-x-auto pb-8 no-scrollbar pl-[calc((100vw-1280px)/2+1.25rem)] md:pl-[calc((100vw-1280px)/2+1.25rem)] min-[0px]:pl-5">
        <BaseCard v-for="imgUrl in images" :key="imgUrl" :imagePath="imgUrl" />
        <div class="min-w-12.5 h-full"></div>
      </div>
    </div>

  </BaseLayout>
</template>

<script setup>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseCard from '../components/layout/BaseCard.vue'


// 1. Beolvassuk a modulokat
const modules = import.meta.glob('/public/model/*.JPG', { eager: true, import: 'default' });

// 2. Kigyűjtjük az útvonalakat és levágjuk a '/public' részt az elejéről
const images = Object.values(modules).map(path => path.replace('/public', ''));
</script>