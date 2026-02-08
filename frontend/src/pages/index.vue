<template>
  <BaseHeader />
  <BaseLayout>
    <BaseGallery />
    <BaseServices />
    <BaseWorkers />
  </BaseLayout>
</template>

<script setup>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseHeader from '@components/layout/BaseHeader.vue'
import BaseGallery from '@components/layout/BaseGallery.vue';
import BaseServices from '@components/layout/BaseServices.vue';
import BaseWorkers from '@components/layout/BaseWorkers.vue';
</script>