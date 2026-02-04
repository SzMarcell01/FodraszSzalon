<template>
  <div class="snap-always snap-center flex-1 overflow-hidden rounded-[30px] shadow-md cursor-zoom-in mx-3">
   <img :src="imagePath" class="w-full object-cover"></img>
  </div>
</template>

<script setup>
defineProps(['imagePath']);
</script>


<!-- <div class="min-w-[250px] flex-1 max-w-[300px] h-[450px] overflow-hidden rounded-[30px] shadow-md cursor-zoom-in">
    <img :src="imagePath" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
  </div> -->