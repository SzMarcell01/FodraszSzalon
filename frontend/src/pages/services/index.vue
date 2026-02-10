<template>
 <BaseLayout>
    <BaseStaffCard2 :workers="workers"/>
    <h2 class="py-4">Szolgáltatások</h2>
    <BaseService :services="services" :text="text"/>
 </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseService from '@components/BaseService.vue';
import { mapState } from 'pinia';
import { useServiceStore } from '@/stores/ServiceStore.mjs';
import { useWorker } from '@stores/WorkerStore.mjs';
import BaseStaffCard2 from '@components/layout/BaseStaffCard2.vue';

export default {
  data(){
    return{
      text: "Foglalás"
    }
  },
  components: {
    BaseLayout,
    BaseService,
    BaseStaffCard2
  },
  computed:{
    ...mapState(useServiceStore,['services']),
    ...mapState(useWorker, ["workers"])
  },

}
</script>

<route lang="json">
  {
    "name": "services-page"
  }
</route>