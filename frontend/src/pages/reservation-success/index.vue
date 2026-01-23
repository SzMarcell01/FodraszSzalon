<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md text-center space-y-4">
      <div class="text-6xl animate-bounce">🎉</div>
      <h1 class="text-2xl font-bold text-gray-800">Sikeres foglalás!</h1>
      <p class="text-gray-600">
        Küldtük a visszaigazoló emailt a megadott címre.
      </p>
      <RouterLink
        to="/"
        class="inline-block mt-4 px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600"
      >
        Vissza a főoldalra
      </RouterLink>
    </div>
  </div>
</template>

<script setup>
</script>

<route lang="json">
{
  "name": "reservation-success"
}
</route>
