<template>
  <BaseLayout>
    <section class="bg-[#faf9f6] min-h-screen py-12 px-4">
      <div class="max-w-4xl mx-auto">
        
        <div class="mb-8">
          <RouterLink :to="{ name: 'dashboard' }" class="text-[#44223b]/60 hover:text-[#44223b] flex items-center gap-2 mb-4 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Vissza a műszerfalra
          </RouterLink>
          <h1 class="text-3xl font-serif text-[#44223b]">Szolgáltatások kiválasztása</h1>
          <p class="text-gray-600 mt-2">Jelöld be azokat a szolgáltatásokat, amiket kínálsz a vendégeidnek.</p>
        </div>

        <div v-if="loading" class="flex justify-center py-20">
          <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-[#44223b]"></div>
        </div>

        <div v-else class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
          <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
            <span class="text-sm font-semibold uppercase tracking-wider text-[#44223b]/60">
              Elérhető szolgáltatások ({{ services.length }})
            </span>
            <span class="text-xs font-medium text-gray-500 italic">
              {{ selectedServices.length }} kiválasztva
            </span>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
            <div v-for="service in services" :key="service.id" 
              class="border-b border-gray-50 last:border-0 hover:bg-gray-50 transition-colors">
              <label :for="'service-' + service.id" class="flex items-center p-4 cursor-pointer">
                <div class="relative flex items-center">
                  <input 
                    type="checkbox" 
                    :id="'service-' + service.id"
                    v-model="selectedServices"
                    :value="service.id"
                    class="w-5 h-5 rounded border-gray-300 text-[#44223b] focus:ring-[#44223b] transition-all cursor-pointer"
                  >
                </div>
                <div class="ml-4">
                  <p class="font-medium text-[#44223b]">{{ service.name }}</p>
                  <p class="text-xs text-gray-400">{{ service.time }}</p>
                </div>
              </label>
            </div>
          </div>

          <div class="p-6 bg-gray-50 border-t border-gray-100 space-y-4">
            <p v-if="message" :class="status === 'success' ? 'text-green-600' : 'text-red-600'" class="text-center text-sm font-medium animate-pulse">
              {{ message }}
            </p>

            <div class="flex justify-end">
              <button 
                @click="saveServices"
                :disabled="saving"
                class="group flex items-center gap-2 bg-[#44223b] text-white hover:bg-[#5a2d4e] active:scale-[0.98] transition-all duration-300 rounded-xl px-8 py-3 font-semibold uppercase tracking-widest text-sm shadow-lg disabled:opacity-50"
              >
                <span v-if="saving">Mentés folyamatban...</span>
                <span v-else>Beállítások mentése</span>
                <svg v-if="!saving" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
              </button>
            </div>
          </div>
        </div>

      </div>
    </section>
  </BaseLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { http } from "@utils/http.mjs";
import { useRouter } from 'vue-router';
import BaseLayout from '@layouts/BaseLayout.vue';

const router = useRouter();
const services = ref([]);
const selectedServices = ref([]);
const loading = ref(true);
const saving = ref(false);

// Új változók a visszajelzéshez
const message = ref('');
const status = ref('');

const fetchData = async () => {
  const token = localStorage.getItem('auth_token');
  if (!token) {
    router.push('/login');
    return;
  }

  try {
    const [allServicesRes, userRes] = await Promise.all([
      http.get('/services'),
      http.get('/user-data')
    ]);

    services.value = allServicesRes.data;
    
    if (userRes.data.user && userRes.data.user.services) {
      selectedServices.value = userRes.data.user.services.map(s => s.id);
    }
  } catch (error) {
    console.error("Hiba az adatok betöltésekor:", error);
  } finally {
    loading.value = false;
  }
};

const saveServices = async () => {
  saving.value = true;
  message.value = ''; // Üzenet alaphelyzetbe állítása

  try {
    const res = await http.post('/user/services/sync', {
      service_ids: selectedServices.value
    });
    
    status.value = 'success';
    message.value = 'A szolgáltatások sikeresen frissítve!'; 
    
    // 3 másodperc után eltüntetjük az üzenetet (opcionális)
    setTimeout(() => { message.value = '' }, 3000);

  } catch (error) {
    console.error("Hiba a mentés során:", error);
    status.value = 'error';
    message.value = error.response?.data?.message || 'Hiba történt a mentéskor.';
  } finally {
    saving.value = false;
  }
};

onMounted(fetchData);
</script>

<route lang="json">
  {
    "name": "profile_services",
    "meta": {
      "title": "Szolgáltatások kezelése"
    }
  }
</route>