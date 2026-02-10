<template>
  <BaseLayout>
    <section class="bg-[#faf9f6] min-h-screen py-12 px-4">
      <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-serif text-[#44223b]">Üdvözlünk a Dashboardon!</h1>
        <div class="mt-6 p-6 bg-white rounded-2xl shadow-sm border border-gray-100">
          <p class="text-[#44223b]">Szerver üzenete: <strong>{{ message }}</strong></p>
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

const message = ref('Betöltés...');
const router = useRouter();

const fetchDashboardData = async () => {
  const token = localStorage.getItem('auth_token');

  if (!token) {
    router.push('login');
    return;
  }

  try {
    // Itt definiáljuk a response-t
    const res = await http.get('/user-data', {
      headers: {
        'Authorization': `Bearer ${token}`
      }
    });
    
    // Csak ha sikeres a kérés, akkor írjuk be az üzenetet
    message.value = res.data.message;

  } catch (error) {
    console.error("Hiba történt:", error);
    
    // Itt már nem szabad a 'response' változóra hivatkozni, 
    // helyette az 'error.response'-t kell nézni!
    if (error.response?.status === 401) {
      message.value = "Lejárt munkamenet, jelentkezz be újra.";
      localStorage.removeItem('auth_token');
      router.push('/login');
    } else {
      message.value = "Hiba az adatok lekérésekor.";
    }
  }
};

onMounted(fetchDashboardData);
</script>