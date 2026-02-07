<template>
    <div id="gallery" class="mx-auto md:h-screen mt-10">
      <h2 class="text-4xl font-serif pl-6 md:pl-32 text-[#4a2c40] mb-10">Tekintsd meg munkáinkat</h2>
      
      <div ref="scrollContainer" class="flex gap-3 snap-x md:pl-56 snap-mandatory scroll-pl-96 overflow-x-scroll p-7 scroll-smooth no-scrollbar">
        <BaseCard v-for="imgUrl in images" :key="imgUrl" :imagePath="imgUrl" />
      </div>
      <div class="flex justify-end gap-4 pr-10 mt-4 max-w-[calc(100%-56px)]">
        <button @click="scroll('left')" class="group bg-[#4a2c40] p-3 rounded-full text-white transition-all duration-300 hover:scale-110 active:scale-95 shadow-md">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 group-hover:-translate-x-1 transition-transform">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
          </svg>
        </button>
      
        <button @click="scroll('right')" class="group bg-[#4a2c40] p-3 rounded-full text-white transition-all duration-300 hover:scale-110 active:scale-95 shadow-md">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 group-hover:translate-x-1 transition-transform">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
          </svg>
        </button>
      </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import BaseCard from './BaseCard.vue';

const modules = import.meta.glob('/public/model/*.JPG', { eager: true, import: 'default' });
const images = Object.values(modules).map(path => path.replace('/public', ''));

const scrollContainer = ref(null);

const scroll = (direction) => {
  if (scrollContainer.value) {
    const scrollAmount = 400; // Egy kattintásra ennyit ugrik
    scrollContainer.value.scrollBy({
      left: direction === 'left' ? -scrollAmount : scrollAmount,
      behavior: 'smooth'
    });
  }
};
</script>

<style scoped>
/* Eltünteti a görgetősávot, de a görgetés megmarad */
.no-scrollbar::-webkit-scrollbar {
  display: none;
}
.no-scrollbar {
  -ms-overflow-style: none;
  scrollbar-width: none;
}
</style>