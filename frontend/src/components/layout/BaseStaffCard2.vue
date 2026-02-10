<template>
    <div v-for="worker in workers">
        <img :src="BaseUrl + worker.image_url" alt="" class="rounded-full w-44 h-44 object-cover">
        <hr>
        <span>{{ worker.name }}</span>
    </div>

</template>
<script>

export default {
    props:{
        workers: Object
    },
    data(){
      return{
        BaseUrl: import.meta.env.VITE_API_BASE_URL
      }
    }
}
</script>