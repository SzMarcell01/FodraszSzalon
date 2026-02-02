<template>
  <BaseHeader />
  <main class="mx-auto w-max-[1500px]">
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
