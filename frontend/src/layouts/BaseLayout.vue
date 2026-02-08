<template>
  <main class="mx-auto">
    <!--<main class="mx-auto max-w-7xl">-->
    <slot />
  </main>
</template>
<script>
import BaseHeader from '@components/layout/BaseHeader.vue'
export default {
  components: {
    BaseHeader
  }
}
</script>
