<template>
  <header>
    <BaseHeader class="w-full bg-[#f5ddff]"/>
  </header>
  <main class="container mx-auto">
    <slot />
  </main>
</template>

<script>
  import BaseHeader from '@components/layout/BaseHeader.vue';
  export default{
    components:{
      BaseHeader
    }
  }
</script>