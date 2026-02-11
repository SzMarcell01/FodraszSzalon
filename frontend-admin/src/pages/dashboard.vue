<template>
  <BaseLayout>
    <section class="bg-[#faf9f6] min-h-screen py-12 px-4">
      <!-- DASHBOARD MESSAGE START -->
      <div class="max-w-7xl mx-auto">
        <div class="w-30 h-30 rounded-full overflow-hidden border-4 border-[#44223b]/10 shadow-inner bg-gray-50 mb-6">
          <img v-if="userImage" :src="BaseURL + userImage" alt="Profilkép">
          <div v-else class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-full flex items-center justify-center text-gray-500">
            Nincs még kép
          </div>
        </div>
        <h1 class="text-3xl font-serif text-[#44223b]">
          <span v-if="userName">Üdvözlünk, {{ userName }}!</span>
          <span v-else>Betöltés...</span>
        </h1>
        <div class="mt-6 p-6 bg-white rounded-2xl shadow-sm border border-gray-100">
          <p class="text-[#44223b]">Szerver üzenete: <strong>{{ message }}</strong></p>
        </div>
      </div>
      <!-- DASHBOARD MESSAGE END -->

      <!-- PROFILE IMG EDITING -->
       <div class="max-w-7xl mx-auto mt-6 p-6 bg-white rounded-2xl shadow-sm border border-gray-100">
          <p class="text-[#44223b]">Profilkép szerkesztése: <strong>Töltsön fel egy profilképet, hogy a MolnArt weboldalon láthassák a felhasználók magát.
          <RouterLink :to="{name: 'profile_img'}">
            <button type="submit" :disabled="loading"
              class="sm:w-md w-full mt-5 group flex items-center justify-center gap-2 bg-[#44223b] text-white hover:bg-[#5a2d4e] active:scale-[0.98] transition-all duration-300 rounded-xl py-4 font-semibold uppercase tracking-widest text-sm shadow-lg disabled:opacity-50">
              <span>Kép feltöltése</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7" />
              </svg>
            </button>
          </RouterLink>
          </strong></p>
        </div>

        <!-- SEVICES EDITING -->
       <div class="max-w-7xl mx-auto mt-6 p-6 bg-white rounded-2xl shadow-sm border border-gray-100">
          <p class="text-[#44223b]">Szolgáltatások szerkesztése: <strong>Tölts fel szolgáltatásokat, hogy a MolnArt weboldalon láthassák a felhasználók, hogy miket kínál.
          <RouterLink :to="{name: 'profile_services'}">
            <button type="submit" :disabled="loading"
              class="sm:w-md w-full mt-5 group flex items-center justify-center gap-2 bg-[#44223b] text-white hover:bg-[#5a2d4e] active:scale-[0.98] transition-all duration-300 rounded-xl py-4 font-semibold uppercase tracking-widest text-sm shadow-lg disabled:opacity-50">
              <span>Szolgáltatás szerkesztése</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7" />
              </svg>
            </button>
          </RouterLink>
          </strong></p>
        </div>
    </section>
  </BaseLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { http } from "@utils/http.mjs";
import { useRouter } from 'vue-router';
import BaseLayout from '@layouts/BaseLayout.vue';

const loading = ref(false);
const message = ref('Betöltés...');
const userName = ref(''); 
const userImage = ref('');
const router = useRouter();
const BaseURL = import.meta.env.VITE_API_BASE_URL;

const fetchDashboardData = async () => {
  const token = localStorage.getItem('auth_token');

  if (!token) {
    router.push('/login'); // Érdemes kitenni a per jelet
    return;
  }

  loading.value = true; // Indul a töltés

  try {
    // 1. Először elküldjük a kérést és megvárjuk a választ (await)
    const res = await http.get('/user-data', {
      headers: {
        'Authorization': `Bearer ${token}`
      }
    });
    
    // 2. Most már létezik a 'res', megnézhetjük a konzolon
    console.log("Szerver válasza:", res.data);

    // 3. Beállítjuk az üzenetet
    message.value = res.data.message || "Sikeres betöltés";

    // 4. Beállítjuk a nevet (biztonságos ellenőrzéssel)
    if (res.data.user && res.data.user.name) {
      userName.value = res.data.user.name;
    } else {
      userName.value = "Felhasználó";
    }

    // 5. Beállítjuk a képet (biztonságos ellenőrzéssel)
    if (res.data.user && res.data.user.image_url) {
      userImage.value = res.data.user.image_url;
    } else {
      userImage.value = null; // Ha nincs kép, null értéket állítunk
    }

    console.log(userImage.value,BaseURL + userImage.value);

  } catch (error) {
    console.error("Hiba történt:", error);
    
    if (error.response?.status === 401) {
      message.value = "Lejárt munkamenet, jelentkezz be újra.";
      localStorage.removeItem('auth_token');
      router.push('/login');
    } else {
      message.value = "Hiba az adatok lekérésekor.";
    }
  } finally {
    loading.value = false; // A végén mindenképp leállítjuk a töltést
  }
};

onMounted(fetchDashboardData);
</script>

<route lang="json">
  {
    "name": "dashboard",
    "meta": {
      "title": "Dashboard"
    }
  }
</route>