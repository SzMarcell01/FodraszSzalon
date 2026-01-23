<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <form class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-lg space-y-4">
        
    <div class="flex gap-4">
      <div class="flex-1 flex flex-col">
        <label for="firstName" class="mb-1 font-medium text-gray-700">Kereszt név:</label>
        <input
          type="text"
          id="firstName"
          name="firstName"
          class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>
      <div class="flex-1 flex flex-col">
        <label for="lastName" class="mb-1 font-medium text-gray-700">Vezetéknév:</label>
        <input
          type="text"
          id="lastName"
          name="lastName"
          class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>
    </div>

    <div class="flex flex-col">
      <label for="email" class="mb-1 font-medium text-gray-700">Email cím:</label>
      <input
        type="email"
        id="email"
        name="email"
        class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
    </div>

    <div class="flex flex-col">
      <label for="phone" class="mb-1 font-medium text-gray-700">Telefonszám:</label>
      <input
        type="tel"
        id="phone"
        name="phone"
        class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
    </div>

    <div class="flex flex-col">
      <label for="reservationDateTime" class="mb-1 font-medium text-gray-700">Foglalás dátuma és ideje:</label>
      <input
        type="datetime-local"
        id="reservationDateTime"
        name="reservationDateTime"
        class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
    </div>

    <div class="flex flex-col">
      <label for="duration" class="mb-1 font-medium text-gray-700">Időtartam (óra):</label>
      <input
        type="number"
        id="duration"
        name="duration"
        min="1"
        max="8"
        class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
    </div>

    <button
      type="submit"
      class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition-colors"
    >
      Foglalás
    </button>
  </form>
  </div>
</template>

<script>

</script>