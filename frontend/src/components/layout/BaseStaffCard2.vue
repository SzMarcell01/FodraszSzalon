<template>
    <div v-for="user in users">
        <img :src="BaseUrl + user.image_url" alt="" class="rounded-full w-44 h-44 object-cover">
        <hr>
        <span>{{ user.name }}</span>
    </div>

</template>
<script>

export default {
    props:{
        users: Array
    },
    data(){
      return{
        BaseUrl: import.meta.env.VITE_API_BASE_URL
      }
    }
}
</script>