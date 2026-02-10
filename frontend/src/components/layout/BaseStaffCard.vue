<template>
  <div v-for="worker in workers" class="p-4 w-fit text-black rounded-sm">
    <img :src="BaseUrl + worker.image_url" alt="" class="rounded-full w-44 h-44 object-cover">
    <h3 class="font-semibold text-center">{{ worker.name }}</h3>
    <!-- <p class="text-gray-400">{{ worker.description }}</p> -->
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