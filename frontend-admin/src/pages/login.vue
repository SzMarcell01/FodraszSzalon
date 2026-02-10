<template>
  <BaseLayout>
    <section class="bg-[#faf9f6] min-h-screen py-12 flex items-center justify-center font-sans">
      <div class="max-w-md w-full px-6">
        
        <div class="text-center mb-10">
          <h2 class="text-3xl md:text-5xl font-serif text-[#44223b] mb-4">Bejelentkezés</h2>
          <div class="w-16 h-1 bg-[#44223b] mx-auto opacity-20"></div>
        </div>

        <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
          <form @submit.prevent="handleLogin" class="space-y-6">
            
            <transition name="fade">
              <div v-if="error" class="text-xs font-bold text-red-500 uppercase tracking-widest bg-red-50 p-3 rounded-lg border border-red-100">
                {{ error }}
              </div>
            </transition>

            <div class="space-y-2">
              <label class="block text-xs font-bold uppercase tracking-[0.2em] text-[#44223b]/60">E-mail</label>
              <input v-model="form.email" type="email" required
                class="w-full px-0 py-3 bg-transparent border-b-2 border-gray-100 focus:border-[#44223b] outline-none transition-all text-[#44223b]">
            </div>

            <div class="space-y-2">
              <label class="block text-xs font-bold uppercase tracking-[0.2em] text-[#44223b]/60">Jelszó</label>
              <input v-model="form.password" type="password" required
                class="w-full px-0 py-3 bg-transparent border-b-2 border-gray-100 focus:border-[#44223b] outline-none transition-all text-[#44223b]">
            </div>

            <button type="submit" :disabled="loading"
              class="w-full group flex items-center justify-center gap-2 bg-[#44223b] text-white hover:bg-[#5a2d4e] active:scale-[0.98] transition-all duration-300 rounded-xl py-4 font-semibold uppercase tracking-widest text-sm shadow-lg disabled:opacity-50">
              <span v-if="loading">Azonosítás...</span>
              <span v-else>Belépés</span>
              <svg v-if="!loading" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7" />
              </svg>
            </button>
          </form>
        </div>
      </div>
    </section>
  </BaseLayout>
</template>

<script setup>
import { ref, reactive } from 'vue';
import { http } from "@utils/http.mjs";
import { useRouter } from 'vue-router'; // Ha használsz vue-routert
import BaseLayout from '@layouts/BaseLayout.vue';

const router = useRouter();
const loading = ref(false);
const error = ref(null);

const form = reactive({
  email: '',
  password: ''
});

const handleLogin = async () => {
  loading.value = true;
  error.value = null;

  try {
    const response = await http.post('/login', form);
    
    // Elmentjük a tokent a LocalStorage-ba a későbbi kérésekhez
    localStorage.setItem('auth_token', response.data.token);
    
    // Átirányítás a Dashboard-ra
    router.push('/dashboard'); 
  } catch (err) {
    error.value = err.response?.data?.message || 'Sikertelen bejelentkezés.';
  } finally {
    loading.value = false;
  }
};
</script>

<route lang="json">
  {
    "name": "login",
    "meta": {
      "title": "Bejelentkezés"
    }
  }
</route>