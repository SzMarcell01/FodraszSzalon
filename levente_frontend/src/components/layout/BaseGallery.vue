<template>
  <div class="h-screen flex flex-col items-center justify-center overflow-hidden relative w-full">
    
    <h3 class="w-7xl">Galléria</h3>

    <div class="md:hidden w-full overflow-hidden">
      <div class="flex animate-infinite-scroll space-x-4 px-4">
        <img v-for="(img, index) in [...images, ...images]" :key="index" :src="img" 
             class="h-64 w-auto object-cover rounded-lg shadow-xl shrink-0">
      </div>
    </div>

    <div class="hidden md:flex flex-col w-full h-full justify-center">
      <div class="w-full overflow-visible">
        <div 
          class="flex gap-8 transition-all"
          :class="{ 'duration-700 ease-in-out': isAnimating, 'duration-0': !isAnimating }"
          :style="{ transform: `translateX(calc(-${imgWidth}px - ${offset}px + ${sidePadding}px))` }"
        >
          <img v-for="(img, index) in images" :key="img" :src="img"
               class="h-[500px] w-[400px] object-cover rounded-2xl shadow-2xl shrink-0 transition-opacity duration-500"
               :class="{ 'opacity-100': index === 1, 'opacity-40': index !== 1 }">
        </div>
      </div>

      <div class="absolute right-10 bottom-20 flex space-x-4 z-30 w-[200px]">
        <button @click="prev" :disabled="isAnimating" class="bg-[#44223B] text-white w-full p-2 rounded-md">
          Ball
        </button>
        <button @click="next" :disabled="isAnimating" class="bg-[#44223B] text-white w-full p-2 rounded-md">
          Jobb
        </button>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref } from 'vue';

const images = ref([
  '/model/1.JPG',
  '/model/2.JPG',
  '/model/3.JPG',
  '/model/4.JPG',
  '/model/5.JPG',
  '/model/6.JPG',
  '/model/7.JPG',
]);

const isAnimating = ref(false);
const offset = ref(0);
const imgWidth = 432; // 400px kép + 32px gap
const sidePadding = 60; // EZZEL ÁLLÍTOD, HOGY MENNYIRE LEGYEN TÁVOL A BAL SZÉLÉTŐL (pixelben)

const next = () => {
  if (isAnimating.value) return;
  
  isAnimating.value = true;
  offset.value = imgWidth;

  setTimeout(() => {
    isAnimating.value = false;
    const first = images.value.shift();
    images.value.push(first);
    offset.value = 0;
  }, 700);
};

const prev = () => {
  if (isAnimating.value) return;

  isAnimating.value = true;
  offset.value = -imgWidth;

  setTimeout(() => {
    isAnimating.value = false;
    const last = images.value.pop();
    images.value.unshift(last);
    offset.value = 0;
  }, 700);
};
</script>

<style scoped>
@keyframes scroll {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

.animate-infinite-scroll {
  display: flex;
  width: max-content;
  animation: scroll 30s linear infinite;
}

.transition-all {
  transition-property: transform, opacity;
  will-change: transform;
}
</style>