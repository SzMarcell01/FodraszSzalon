<template>
  <div v-for="(worker, key) in workers" :key="key" class="p-4 ml-4 mb-2 w-2xl text-black rounded-sm border-[#44223B] border">
    <h3 class="font-semibold">{{ worker.name }}</h3>
    <p class="text-gray-400">{{ worker.description }}</p>
  </div>
</template>

<script>
export default {
    props: {
        workers: Object
    }
}
</script>