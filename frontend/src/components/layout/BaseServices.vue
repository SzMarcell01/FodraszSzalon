<template>
    <div id="services" class="h-screen p-6">
        <h2 class="text-4xl pl-6 md:pl-32 font-serif text-[#4a2c40] mb-10">Szolgáltatásaink</h2>

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

                <div class="w-full md:w-1/3 border border-gray-200 shadow-xl rounded-xl p-6 bg-white sticky top-10">
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
                        <div class="mt-8 pt-4 border-t border-gray-100 flex items-start gap-2">
                            <svg class="w-5 h-5 text-gray-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <p class="text-xs text-gray-600">
                                Budapest, Hajós u. 88, 1066<br>
                                <!-- <RouterLink /> <a href="#" class="text-blue-500 underline">Útbaigazítás megtekintése</a> -->
                            </p>
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