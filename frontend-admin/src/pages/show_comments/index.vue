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
          <h1 class="text-3xl font-serif text-[#44223b]">Érkezett vélemények</h1>
          <p class="text-gray-600 mt-2">Itt láthatod a vendégeid által beküldött értékeléseket és szöveges véleményeket.</p>
        </div>

        <div v-if="loading" class="flex justify-center py-20">
          <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-[#44223b]"></div>
        </div>

        <div v-else>
          <div v-if="userComments.length === 0" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-12 text-center">
            <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
              </svg>
            </div>
            <p class="text-gray-500 font-medium">Még nem érkezett egyetlen vélemény sem.</p>
          </div>

          <div v-else class="grid grid-cols-1 gap-4">
            <div v-for="comment in userComments" :key="comment.id" 
                 class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-[#44223b]/20 transition-all duration-300">
              
              <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-1">
                  <span v-for="star in 5" :key="star" class="text-lg relative">
                    <span class="text-gray-200">★</span>
                    
                    <span 
                      class="absolute top-0 left-0 overflow-hidden text-amber-400"
                      :style="{ width: getStarWidth(star, comment.rating) }"
                    >★</span>
                  </span>
                  <span class="ml-2 text-sm font-bold text-[#44223b]">{{ comment.rating }}</span>
                </div>
                <span class="text-xs text-gray-400 font-mono">ID: #{{ comment.id }}</span>
              </div>

              <div class="relative">
                <svg class="absolute -top-2 -left-2 h-8 w-8 text-gray-50 opacity-50" fill="currentColor" viewBox="0 0 32 32">
                  <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                </svg>
                <p class="text-gray-700 leading-relaxed italic relative z-10 pl-4">
                  {{ comment.comment }}
                </p>
              </div>

              <div class="mt-4 pt-4 border-t border-gray-50 flex justify-end">
                <div class="text-[10px] uppercase tracking-widest text-gray-300 font-bold">Vásárlói visszajelzés</div>
              </div>
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
const userComments = ref([]);
const loading = ref(true);

// Segédfüggvény a csillagok szélességének kiszámításához (a félcsillagokhoz)
const getStarWidth = (starIndex, rating) => {
  if (rating >= starIndex) return '100%';
  if (rating > starIndex - 1) return '50%';
  return '0%';
};

const fetchComments = async () => {
  // 1. Jogosultság ellenőrzése
  const token = localStorage.getItem('auth_token');
  if (!token) {
    router.push('/login');
    return;
  }

  loading.value = true;
  try {
    const res = await http.get('/user-data');
    
    if (res.data.user && res.data.user.comments) {
      userComments.value = res.data.user.comments;
    }
  } catch (error) {
    console.error("Hiba az adatok betöltésekor:", error);
    // Ha a szerver 401-et dob, akkor is érdemes kiléptetni
    if (error.response?.status === 401) {
      router.push('/login');
    }
  } finally {
    loading.value = false;
  }
};

onMounted(fetchComments);
</script>

<route lang="json">
{
  "name": "show_comments",
  "meta": {
    "title": "Megjelenített hozzászólások"
  }
}
</route>