<template>
  <BaseLayout>
    <section class="bg-[#faf9f6] min-h-screen flex items-center justify-center px-4 overflow-hidden relative">
      <div class="absolute top-0 left-0 w-64 h-64 bg-[#44223b] opacity-[0.03] rounded-full -translate-x-1/2 -translate-y-1/2"></div>
      <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#44223b] opacity-[0.03] rounded-full translate-x-1/3 translate-y-1/3"></div>

      <div class="max-w-3xl w-full text-center z-10">
        <div class="mb-8 inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-white shadow-sm border border-gray-100 rotate-3">
           <span class="text-4xl font-serif text-[#44223b]">M</span>
        </div>

        <h1 class="text-4xl md:text-6xl font-serif text-[#44223b] mb-6 leading-tight">
          Üdvözöljük a <br>
          <span class="italic text-[#5a2d4e]">MolnArt Admin</span> felületen
        </h1>

        <p class="text-lg text-[#44223b]/70 mb-10 max-w-xl mx-auto leading-relaxed">
          Kezelje szolgáltatásait, frissítse profilját és kövesse nyomon portfólióját egyetlen elegáns felületen.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
          <RouterLink 
            :to="{ name: 'login' }" 
            class="w-full sm:w-auto px-10 py-4 bg-[#44223b] text-white rounded-xl font-semibold uppercase tracking-widest text-sm shadow-xl hover:bg-[#5a2d4e] active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-2"
          >
            Belépés a fiókba
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7" />
            </svg>
          </RouterLink>
          
          <a 
            href="https://molnart.hu" 
            target="_blank"
            class="w-full sm:w-auto px-10 py-4 bg-white text-[#44223b] border border-gray-200 rounded-xl font-semibold uppercase tracking-widest text-sm hover:bg-gray-50 transition-all duration-300 text-center"
          >
            Weboldal megtekintése
          </a>
        </div>

        <div class="mt-16 pt-8 border-t border-gray-200/50 flex items-center justify-center gap-8 opacity-40 grayscale hover:grayscale-0 transition-all duration-500">
          <span class="text-xs font-bold uppercase tracking-widest text-[#44223b]">Portfólió</span>
          <span class="text-xs font-bold uppercase tracking-widest text-[#44223b]">Szolgáltatások</span>
          <span class="text-xs font-bold uppercase tracking-widest text-[#44223b]">Adminisztráció</span>
        </div>
      </div>
    </section>
  </BaseLayout>
</template>

<script setup>
import BaseLayout from '@layouts/BaseLayout.vue';
</script>

<style scoped>
/* Egy kis finom animáció a megjelenéskor */
section {
  animation: fadeIn 0.8s ease-out;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>

<route lang="json">
{
  "name": "home",
  "meta": {
    "title": "MolnArt Admin"
  }
}
</route>