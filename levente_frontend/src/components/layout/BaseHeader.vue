<template>
  <header class="relative h-screen bg-[url('/bg.jpg')] bg-cover bg-center">

    <div class="absolute inset-0 bg-black/60 backdrop-blur-xs"></div>

    <nav class="relative z-10 max-w-7xl flex items-center justify-between mx-auto p-2">

      <h1 class="text-white z-20">MolnArt</h1>

      <!-- DESKTOP -->
      <ul class="hidden md:flex space-x-4 text-white">
        <li><a href="#">Főoldal</a></li>
        <li><a href="#">Galléria</a></li>
        <li><a href="#">Szolgáltatásaink</a></li>
        <li><a href="#">Csapatunk</a></li>
        <li><a href="#">Rólunk</a></li>
      </ul>

      <!-- HAMBURGER -->
      <button @click="menuOpen = !menuOpen" class="md:hidden z-20" >
        <div :class="['container', { change: menuOpen }]">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
      </button>

      <!-- MOBILE MENU -->
      <transition
        enter-active-class="transition transform duration-600 ease-out"
        enter-from-class="-translate-y-full"
        enter-to-class="translate-y-0"
        leave-active-class="transition transform duration-600 ease-in"
        leave-from-class="translate-y-0"
        leave-to-class="-translate-y-full"
      >
        <div v-if="menuOpen" class="fixed top-0 left-0 w-full h-screen bg-black/90 text-white flex flex-col items-center justify-center space-y-6  md:hidden z-10" >
          <a href="#">Főoldal</a>
          <a href="#">Galléria</a>
          <a href="#">Szolgáltatásaink</a>
          <a href="#">Csapatunk</a>
          <a href="#">Rólunk</a>
        </div>
      </transition>

    </nav>

    <!-- WELCOME TEXT --> 
    <div class="absolute inset-0 flex flex-col items-center justify-center mx-5">
      <h2 class="lg:text-5xl text-3xl text-center">Üdvözöljük a MolnArt haj szalonban!</h2>
      <p class="text-1xl text-white max-w-3xl text-center mt-2">Nálunk a hajad a kreativitásunk vászna. Trendi, precíz, rád szabott vágások, amik tényleg tükrözik a személyiséged. Foglalj online, és hagyd, hogy a profik megalkossák a tökéletes frizurát.</p>
      <button type="button" class="bg-white text-black px-6 py-2 rounded-md hover:bg-gray-200 transition-colors mt-10">
        Szolgáltatásaink
      </button>
    </div>

  </header>

</template>


<script setup>
import { ref } from 'vue'

const menuOpen = ref(false)
</script>

<style>
.container {
  display: inline-block;
  cursor: pointer;
}

.bar1, .bar2, .bar3 {
  width: 35px;
  height: 5px;
  background-color: white;
  margin: 6px 0;
  transition: 0.4s;
}

.change .bar1 {
  transform: translate(0, 11px) rotate(-45deg);
}

.change .bar2 {opacity: 0;}

.change .bar3 {
  transform: translate(0, -11px) rotate(45deg);
}
</style>