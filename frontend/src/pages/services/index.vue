<template>
 <BaseLayout>
    <h2 class="py-4">Szolgáltatások</h2>
    <BaseService :services="services" />
 </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseService from '@components/BaseService.vue';
import { mapState } from 'pinia';
import { useServiceStore } from '@/stores/ServiceStore.mjs';

export default {
  components: {
    BaseLayout,
    BaseService
  },
  computed:{
    ...mapState(useServiceStore,['services'])
  }
}
</script>