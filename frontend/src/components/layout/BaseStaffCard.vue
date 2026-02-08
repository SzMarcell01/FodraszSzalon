<template>
  <div v-for="worker in workers" :key="worker">
    <h3>{{ worker.name }}</h3>
    <p>{{ worker.description }}</p>
  </div>
</template>

<script>
export default {
  props: {
    worker: Object
  }
}
</script>