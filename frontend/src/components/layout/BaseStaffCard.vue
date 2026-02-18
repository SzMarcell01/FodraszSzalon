<template>
  <div v-for="user in users" class="p-4 w-fit text-black rounded-sm">
    <img :src="BaseUrl + user.image_url" alt="" class="rounded-full w-44 h-44 object-cover">
    <h3 class="font-semibold text-center">{{ user.name }}</h3>
    <!-- <p class="text-gray-400">{{ worker.description }}</p> -->
  </div>
</template>

<script>
export default {
    props: {
      users: Object
    },
    data(){
      return{
        BaseUrl: import.meta.env.VITE_API_BASE_URL
      }
    },
    method() {
      console.log(BaseUrl)
    }
}
</script>