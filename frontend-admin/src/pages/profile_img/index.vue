<template>
  <BaseLayout>
    <section class="bg-[#faf9f6] min-h-screen py-12 px-4">
      <div class="max-w-2xl mx-auto bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
        <h2 class="text-2xl font-serif text-[#44223b] mb-6">Profilkép módosítása</h2>

        <div class="flex flex-col items-center gap-6">
          <div class="relative w-40 h-40 rounded-full overflow-hidden border-4 border-[#44223b]/10 shadow-inner bg-gray-50">
            <img v-if="previewUrl" :src="previewUrl" class="w-full h-full object-cover" />
            <div v-else class="flex items-center justify-center h-full text-gray-400">Nincs kép</div>
          </div>

          <div class="w-full space-y-4">
            <input 
              type="file" 
              @change="onFileChange" 
              accept="image/*"
              class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#44223b]/10 file:text-[#44223b] hover:file:bg-[#44223b]/20"
            />

            <button 
              @click="uploadImage" 
              :disabled="!selectedFile || loading"
              class="w-full bg-[#44223b] text-white py-3 rounded-xl font-semibold uppercase tracking-widest text-sm hover:bg-[#5a2d4e] disabled:opacity-50 transition-all shadow-lg flex justify-center items-center gap-2"
            >
              <span v-if="loading">Feltöltés...</span>
              <span v-else>Kép mentése</span>
            </button>
            
            <p v-if="message" :class="status === 'success' ? 'text-green-600' : 'text-red-600'" class="text-center text-sm font-medium">
              {{ message }}
            </p>

            <RouterLink :to="{name: 'dashboard'}" class="block text-center text-sm text-[#44223b]/80 hover:text-[#44223b]">
              Vissza a műszerfalra
            </RouterLink>
          </div>
        </div>
      </div>
    </section>
  </BaseLayout>
</template>

<script setup>
import { ref } from 'vue';
import { http } from "@utils/http.mjs";
import BaseLayout from '@layouts/BaseLayout.vue';

const selectedFile = ref(null);
const previewUrl = ref(null);
const loading = ref(false);
const message = ref('');
const status = ref('');

// Amikor a felhasználó kiválaszt egy fájlt
const onFileChange = (event) => {
  const file = event.target.files[0];
  if (!file) return;

  selectedFile.value = file;
  
  // Előnézet generálása
  const reader = new FileReader();
  reader.onload = (e) => {
    previewUrl.value = e.target.result;
  };
  reader.readAsDataURL(file);
};

// Feltöltés a szerverre
const uploadImage = async () => {
  if (!selectedFile.value) return;

  loading.value = true;
  message.value = '';
  const token = localStorage.getItem('auth_token');

  // FormData használata kötelező fájlfeltöltésnél!
  const formData = new FormData();
  formData.append('image', selectedFile.value);

  try {
    const res = await http.post('/user/update-image', formData, {
      headers: {
        'Authorization': `Bearer ${token}`,
        'Content-Type': 'multipart/form-data' // Az Axios ezt általában magától felismeri FormData-nál
      }
    });

    status.value = 'success';
    message.value = res.data.message;
    
    // Opcionálisan frissíthetjük a globális user state-et itt
  } catch (error) {
    status.value = 'error';
    message.value = error.response?.data?.message || "Hiba történt a feltöltés során.";
  } finally {
    loading.value = false;
  }
};
</script>

<route lang="json">
  {
    "name": "profile_img",
    "meta": {
      "title": "Profilkép szerkesztése"
    }
  }
</route>