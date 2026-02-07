<template>
  <BaseHeader />
  <BaseLayout>
    <BaseGallery />
    <BaseServices />
  </BaseLayout>
</template>

<script setup>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseHeader from '@components/layout/BaseHeader.vue'
import BaseGallery from '@components/layout/BaseGallery.vue';
import BaseServices from '@components/layout/BaseServices.vue';
</script>