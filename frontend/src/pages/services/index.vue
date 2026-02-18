<template>
 <BaseLayout>
    <BaseStaffCard2 :users="users"/>
    <h2 class="py-4 text-center">Szolgáltatások</h2>
    <div v-for="user in users" :key="user.id">
      <BaseService :services="user.services" :text="text"/>
    </div>
 </BaseLayout>
</template>

<script>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseService from '@components/BaseService.vue';
import { mapState } from 'pinia';
import BaseStaffCard2 from '@components/layout/BaseStaffCard2.vue';
import { useUser } from '@stores/UserStore.mjs';

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
    ...mapState(useUser, ["users"])
  },

}
</script>

<route lang="json">
  {
    "name": "services-page"
  }
</route>