<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100 relative">
    <!-- Spinner overlay -->
    <BaseSpinner :show="loading" />

    <form
      class="max-w-lg w-full mx-auto p-6 bg-white shadow-md rounded-lg space-y-4"
      @submit.prevent="submitReservation"
    >
      <div class="flex gap-4">
        <div class="flex-1 flex flex-col">
          <label class="mb-1 font-medium text-gray-700">Kereszt név:</label>
          <input
            v-model="firstName"
            type="text"
            class="border rounded-md px-3 py-2"
            required
          />
        </div>

        <div class="flex-1 flex flex-col">
          <label class="mb-1 font-medium text-gray-700">Vezetéknév:</label>
          <input
            v-model="lastName"
            type="text"
            class="border rounded-md px-3 py-2"
            required
          />
        </div>
      </div>

      <div class="flex flex-col">
        <label class="mb-1 font-medium text-gray-700">Email cím:</label>
        <input
          v-model="email"
          type="email"
          class="border rounded-md px-3 py-2"
          required
        />
      </div>

      <div class="flex flex-col">
        <label class="mb-1 font-medium text-gray-700">Telefonszám:</label>
        <input
          v-model="phone"
          type="tel"
          class="border rounded-md px-3 py-2"
          required
        />
      </div>

      <div class="flex flex-col">
        <label class="mb-1 font-medium text-gray-700">Foglalás dátuma és ideje:</label>
        <input
          v-model="reservationDateTime"
          type="datetime-local"
          class="border rounded-md px-3 py-2"
          required
        />
      </div>

      <div class="flex flex-col">
        <label class="mb-1 font-medium text-gray-700">Időtartam (óra):</label>
        <input
          v-model="duration"
          type="number"
          min="1"
          max="8"
          class="border rounded-md px-3 py-2"
          required
        />
      </div>

      <button
        type="submit"
        class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 disabled:opacity-50"
        :disabled="loading"
      >
        Foglalás
      </button>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { http } from '@utils/http.mjs'
import BaseSpinner from '@components/layout/BaseSpinner.vue' // a spinner komponens

const router = useRouter()

const firstName = ref('')
const lastName = ref('')
const email = ref('')
const phone = ref('')
const reservationDateTime = ref('')
const duration = ref(1)
const loading = ref(false)

const resetForm = () => {
  firstName.value = ''
  lastName.value = ''
  email.value = ''
  phone.value = ''
  reservationDateTime.value = ''
  duration.value = 1
}

const submitReservation = async () => {
  loading.value = true
  try {
    await http.post('/reservations', {
      firstName: firstName.value,
      lastName: lastName.value,
      email: email.value,
      phone: phone.value,
      reservationDateTime: reservationDateTime.value,
      duration: duration.value,
    })

    // Form reset
    resetForm()

    // Átirányítás a siker oldalra
    router.push('/reservation-success')
  } catch (error) {
    console.error(error)
    alert('Hiba történt a foglalás során')
  } finally {
    loading.value = false
  }
}
</script>
