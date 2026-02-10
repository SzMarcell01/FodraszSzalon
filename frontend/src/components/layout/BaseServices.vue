<!-- <template>
    <div id="services" class="min-h-screen">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-serif text-[#4a2c40] mb-10">Szolgáltatásaink</h2>
        
            <div class="flex flex-col md:flex-row gap-8 items-start">
                <div class="w-full md:w-2/3">
                    <div class="flex flex-col gap-3 mb-8">
                        <BaseService :services="servicesSlice"/>
                    </div>
                    <div class="text-center mt-4">
                        <button class="bg-[#44223b] text-white rounded-md px-10 py-3 text-md font-semibold">
                            <span>Összes megtekintés</span>
                        </button>
                    </div>
                </div>
                
                <div class="w-full md:w-1/3 border border-gray-200 shadow-xl rounded-xl p-6  bg-white md:sticky">
                    <h4 class="text-xl font-bold mb-1">Szolgáltatások</h4>
                    <p class="text-sm text-gray-400 mb-4"></p>

                    <button class="bg-[#44223b] text-white rounded-md w-full py-3 mb-6">
                        <span>Foglalj most</span>
                    </button>

                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> hétfő</span>
                            <span class="font-mono text-gray-600">08:00 - 19:00</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> kedd</span>
                            <span class="font-mono text-gray-600">08:00 - 19:00</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> szerda</span>
                            <span class="font-mono text-gray-600">08:00 - 19:00</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> csütörtök</span>
                            <span class="font-mono text-gray-600">08:00 - 18:00</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> péntek</span>
                            <span class="font-mono text-gray-600">08:00 - 18:00</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-400">
                            <span>szombat</span>
                            <span>Zárva</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-400">
                            <span>vasárnáp</span>
                            <span>Zárva</span>
                        </div>
                        <div class="mt-8 pt-4 border-t border-gray-100 flex items-start gap-2">
                            <svg class="w-5 h-5 text-gray-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <p class="text-xs text-gray-600">
                                Budapest, Hajós u. 88, 1066<br>
                                <a href="#" class="text-blue-500 underline">Útbaigazítás megtekintése</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BaseService from '@components/BaseService.vue';
import { mapActions, mapState } from 'pinia';
import { useServiceStore } from '@/stores/ServiceStore.mjs';

export default {
    data(){
        return{
            servicesSlice: []
        }
    },
    components: {
        BaseService
    },
    computed:{
        ...mapState(useServiceStore,['services'])
    },
    methods:{
        ...mapActions(useServiceStore,['getServicesSlice']),
        async loadServicesSlice() {
            this.servicesSlice = await this.getServicesSlice()
        }
    },
    mounted() {
        this.loadServicesSlice()
    }
}
</script>
 -->

<template>
  <section id="services" class="bg-[#faf9f6] py-12 md:py-20 px-4 md:px-6">
    <div class="max-w-7xl mx-auto">
      
      <div class="text-center mb-10 md:mb-16">
        <h2 class="text-3xl md:text-5xl font-serif text-[#44223b] mb-4">Szolgáltatásaink</h2>
        <div class="w-16 md:w-24 h-1 bg-[#44223b] mx-auto opacity-20"></div>
      </div>

      <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
        
        <div class="w-full lg:w-2/3 order-2 lg:order-1">
          <div class="bg-white rounded-2xl p-5 md:p-8 shadow-sm border border-gray-100">
            <div class="divide-y divide-gray-100">
              <BaseService :services="servicesSlice" :text="text"/>
            </div>
            
            <div class="mt-8 md:mt-10 flex justify-center">
              <RouterLink :to="{name: 'services-page'}" class="w-full sm:w-auto group flex items-center justify-center gap-2 bg-transparent border-2 border-[#44223b] text-[#44223b] hover:bg-[#44223b] hover:text-white transition-all duration-300 rounded-full px-8 py-4 md:py-3 font-semibold uppercase tracking-wider text-sm">
                <span>Összes megtekintése</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </RouterLink>
            </div>
          </div>
        </div>

        <div class="w-full lg:w-1/3 order-1 lg:order-2 lg:sticky lg:top-8 self-start">
          <div class="bg-[#44223b] text-white rounded-2xl p-6 md:p-8 shadow-xl overflow-hidden relative">
            <div class="absolute -right-10 -top-10 w-32 md:w-40 h-32 md:h-40 bg-white/5 rounded-full"></div>
            
            <h4 class="text-xl md:text-2xl font-serif mb-6 relative z-10">Időpontfoglalás</h4>
            <RouterLink :to="{name: 'services-page'}">
                <button class="w-full bg-white text-[#44223b] active:scale-95 hover:bg-gray-100 transition-all rounded-xl py-4 font-bold text-lg mb-8 shadow-lg relative z-10">
                    FOGLALJ MOST
                </button>
            </RouterLink>
            

            <div class="space-y-3 md:space-y-4 relative z-10">
              <p class="text-white/60 uppercase text-xs tracking-[0.2em] font-bold mb-4">Nyitvatartás</p>
              
              <div v-for="(day, index) in schedule" :key="index" 
                   class="flex justify-between items-center text-sm py-1 border-b border-white/10"
                   :class="day.closed ? 'opacity-40' : ''">
                <span class="font-medium">{{ day.name }}</span>
                <span class="font-mono text-xs md:text-sm">{{ day.hours }}</span>
              </div>

              <div class="mt-8 pt-6 border-t border-white/20">
                <div class="flex items-start gap-4">
                  <div class="bg-white/10 p-2 rounded-lg shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                  </div>
                  <div>
                    <p class="text-sm font-light leading-relaxed">
                      Budapest, Hajós u. 31,<br>
                      1066 Magyarország
                    </p>
                    <a href="https://maps.google.com" target="_blank" class="inline-block mt-2 text-xs font-bold border-b border-white/40 hover:border-white transition-all">ÚTBAIGAZÍTÁS</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template><

<script>
import BaseService from '@components/BaseService.vue';
import { mapActions, mapState } from 'pinia';
import { useServiceStore } from '@/stores/ServiceStore.mjs';

export default {
    components: { BaseService },
    data() {
        return {
            servicesSlice: [],
            schedule: [
                { name: 'Hétfő', hours: '08:00 - 19:00' },
                { name: 'Kedd', hours: '08:00 - 19:00' },
                { name: 'Szerda', hours: '08:00 - 19:00' },
                { name: 'Csütörtök', hours: '08:00 - 18:00' },
                { name: 'Péntek', hours: '08:00 - 18:00' },
                { name: 'Szombat', hours: 'Zárva', closed: true },
                { name: 'Vasárnap', hours: 'Zárva', closed: true }
            ],
            text: "Részletek"
        }
    },
    computed: {
        ...mapState(useServiceStore, ['services'])
    },
    methods: {
        ...mapActions(useServiceStore, ['getServicesSlice']),
        async loadServicesSlice() {
            this.servicesSlice = await this.getServicesSlice()
        }
    },
    mounted() {
        this.loadServicesSlice()
    }
}
</script>