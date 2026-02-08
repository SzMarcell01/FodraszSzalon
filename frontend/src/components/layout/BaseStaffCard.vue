<template>
  <div v-for="(worker, key) in workers" :key="key" class="p-4 ml-4 mb-2 w-2xl text-black rounded-sm border-[#44223B] border">
    <img :src="BaseUrl + worker.image_url" alt="">
    <h3 class="font-semibold">{{ worker.name }}</h3>
    <p class="text-gray-400">{{ worker.description }}</p>
  </div>
</template>

<script>
export default {
    props: {
        workers: Object
    },
    data(){
      return{
        BaseUrl: import.meta.env.VITE_API_BASE_URL
      }
    }
}
</script>