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
import axios from 'axios';
import BaseLayout from '@/layouts/BaseLayout.vue'; // Ellenőrizd az elérési utat!

const message = ref('Betöltés...');

const fetchDashboardData = async () => {
  const token = localStorage.getItem('auth_token');
  try {
    const response = await axios.get('http://localhost:8000/api/user-data', {
      headers: {
        'Accept': 'application/json',
        'Authorization': `Bearer ${token}`
      }
    });
    message.value = response.data.message;
  } catch (error) {
    message.value = "Hiba az adatok lekérésekor.";
  }
};

onMounted(fetchDashboardData);
</script>