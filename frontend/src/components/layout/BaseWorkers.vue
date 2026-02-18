<!-- <template>
    <div class="max-w-7xl py-11 mx-auto">
        <div>
            <h2 class="text-4xl font-serif text-[#4a2c40] mb-10">Alkalmazottaink</h2>
        </div>
        <div class="flex flex-col md:flex-row w-fit mx-auto">
            <BaseStaffCard :workers="workers"/>
        </div>
    </div>
</template>

<script>
import { mapState } from 'pinia';
import { useWorker } from '@stores/WorkerStore.mjs';
import BaseStaffCard from './BaseStaffCard.vue';

export default {
    components:{
        BaseStaffCard
    },
    computed: {
        ...mapState(useWorker, ['workers'])
    }
}
</script> -->




<template>
  <section id="staff" class="bg-white py-12 md:py-24 px-4">
    <div class="max-w-7xl mx-auto">
      
      <div class="mb-10 md:mb-16 flex flex-col items-center md:items-start text-center md:text-left">
        <h2 class="text-3xl md:text-5xl font-serif text-[#44223b] mb-3">Alkalmazottaink</h2>
        <div class="w-16 md:w-20 h-1 bg-[#44223b] opacity-20"></div>
      </div>

      <div class="flex flex-wrap gap-6 md:gap-12 justify-center md:justify-start items-start">
        <BaseStaffCard :users="users" class="staff-card-transition w-full sm:w-auto" />
      </div>

      <div class="mt-12 md:mt-20 border-t border-gray-50 pt-8 md:pt-12 px-6">
        <p class="text-gray-400 font-serif italic text-center text-sm md:text-lg leading-relaxed max-w-2xl mx-auto">
          "A szépség nálunk kezdődik, de a Te mosolyoddal válik teljessé."
        </p>
      </div>
    </div>
  </section>
</template>

<script>
import { mapState } from 'pinia';
import BaseStaffCard from './BaseStaffCard.vue';
import { useUser } from '@stores/UserStore.mjs';

export default {
    components: {
        BaseStaffCard
    },
    computed: {
        ...mapState(useUser, ['users'])
    }
}
</script>

<style scoped>
/* Mobilbarát érintési élmény: csak ott animáljon, ahol van egér (hover) */
@media (font-family: 'serif') {
  /* Itt maradhatnak az egyedi font-beállítások */
}

.staff-card-transition :deep(.worker-item) {
  transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
  /* Mobilon egy kis extra alsó margó, ha egymás alá kerülnének */
  margin-bottom: 1rem;
}

@media (min-width: 768px) {
  .staff-card-transition :deep(.worker-item:hover) {
    transform: translateY(-8px);
  }
}

/* BaseStaffCard stílusok reszponzív javítása */
:deep(.worker-image) {
  border: 3px solid #fff;
  box-shadow: 0 4px 20px rgba(0,0,0,0.06);
  transition: all 0.3s ease;
  /* Mobilon picit kisebb képek, ha a képernyő túl kicsi */
  max-width: 140px;
  height: auto;
}

@media (min-width: 768px) {
  :deep(.worker-image) {
    max-width: 180px;
  }
}

:deep(.worker-item:hover .worker-image) {
  border-color: #44223b;
  box-shadow: 0 10px 25px rgba(68, 34, 59, 0.15);
}
</style>