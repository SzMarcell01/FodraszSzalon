<template>

<div class="relative w-full min-h-screen">
  <nav class="absolute top-0 left-0 w-full z-20">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-5">
      <RouterLink to="/" class="flex items-center">
        <span class="text-4xl font-serif text-white tracking-wider">MolnArt</span>
      </RouterLink>
        <button @click="isMenuOpen = !isMenuOpen" class="md:hidden relative w-12 h-12 flex items-center justify-center z-30">
          <span class="absolute w-8 h-0.5 transition-all duration-300" :class="[isMenuOpen ? 'rotate-45 translate-y-0 bg-black' : '-translate-y-3 bg-white']"></span>
          <span class="absolute w-8 h-0.5 transition-all duration-300" :class="[isMenuOpen ? 'opacity-0 bg-black' : 'opacity-100 bg-white']"></span>
          <span class="absolute w-8 h-0.5 transition-all duration-300" :class="[isMenuOpen ? '-rotate-45 translate-y-0 bg-black' : 'translate-y-3 bg-white']"></span>
        </button>
      <ul class="hidden md:flex space-x-10 text-white text-sm uppercase tracking-[0.2em] font-light">
        <li><a class="relative group py-2 transition duration-500 hover:text-[#c5b4a2]" href="#home">Főoldal <span class="absolute bottom-0 left-0 w-0 h-px bg-[#c5b4a2] transition-all duration-700 ease-in-out group-hover:w-full"></span></a></li>
        <li><a class="relative group py-2 transition duration-500 hover:text-[#c5b4a2]" href="#gallery">Galéria <span class="absolute bottom-0 left-0 w-0 h-px bg-[#c5b4a2] transition-all duration-700 ease-in-out group-hover:w-full"></span></a></li>
        <li><a class="relative group py-2 transition duration-500 hover:text-[#c5b4a2]" href="#">Szolgáltatások <span class="absolute bottom-0 left-0 w-0 h-px bg-[#c5b4a2] transition-all duration-700 ease-in-out group-hover:w-full"></span></a></li>
        <li><a class="relative group py-2 transition duration-500 hover:text-[#c5b4a2]" href="#">Csapat <span class="absolute bottom-0 left-0 w-0 h-px bg-[#c5b4a2] transition-all duration-700 ease-in-out group-hover:w-full"></span></a></li>
        <li><a class="relative group py-2 transition duration-500 hover:text-[#c5b4a2]" href="#">Rólunk <span class="absolute bottom-0 left-0 w-0 h-px bg-[#c5b4a2] transition-all duration-700 ease-in-out group-hover:w-full"></span></a></li>
      </ul>
    </div>
    <div class="md:hidden fixed top-0 left-0 w-full h-screen bg-white text-black flex flex-col items-center justify-center transition-all duration-300":class="isMenuOpen ? 'opacity-100 z-20' : 'opacity-0 pointer-events-none z-0'">
      <ul class="flex flex-col items-center space-y-4 py-6 uppercase tracking-widest">
        <li><a href="#home"@click="isMenuOpen = false"class="hover:text-[#c5b4a2] transition">Főoldal <span class="absolute bottom-0 left-0 w-0 h-px bg-[#c5b4a2] transition-all duration-700 ease-in-out group-hover:w-full"></span></a></li>
        <li><a href="#gallery"@click="isMenuOpen = false"class="hover:text-[#c5b4a2] transition">Galéria <span class="absolute bottom-0 left-0 w-0 h-px bg-[#c5b4a2] transition-all duration-700 ease-in-out group-hover:w-full"></span></a></li>
        <li><a href="#"@click="isMenuOpen = false"class="hover:text-[#c5b4a2] transition">Szolgáltatások <span class="absolute bottom-0 left-0 w-0 h-px bg-[#c5b4a2] transition-all duration-700 ease-in-out group-hover:w-full"></span></a></li>
        <li><a href="#"@click="isMenuOpen = false"class="hover:text-[#c5b4a2] transition">Csapat <span class="absolute bottom-0 left-0 w-0 h-px bg-[#c5b4a2] transition-all duration-700 ease-in-out group-hover:w-full"></span></a></li>
        <li><a href="#"@click="isMenuOpen = false"class="hover:text-[#c5b4a2] transition">Rólunk <span class="absolute bottom-0 left-0 w-0 h-px bg-[#c5b4a2] transition-all duration-700 ease-in-out group-hover:w-full"></span></a></li>
      </ul>
    </div>
  </nav>
<!-- a href="#"@click="isMenuOpen = false"class="hover:text-[#c5b4a2] transition" -->
  <div id="home" class="w-full min-h-screen bg-cover bg-center bg-[url('/bg.jpg')]">
    <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
      <div class="text-center text-white px-4">
        <h1 class="text-5xl text-[rgb(181_164_148)] font-bold font-serif mb-4">Fedezd fel az egyedi stílusod!</h1>
      
        <p class="p-3">Nálunk a hajad a kreativitásunk vászna. Trendi, precíz, rád szabott vágások,<br> amik tényleg tükrözik a személyiséged. Foglalj online, és hagyd, hogy a <br> profik megalkossák a tökéletes frizurát.</p>
        
       <button class="border text-white hover:bg-[#fcfcfc42] py-3 px-10 text-sm font-semibold transition duration-300 ease-out transform hover:scale-110">
          Szolgáltatásaink
        </button>
      </div>
    </div>
  </div>
</div>
</template>

<script setup>
import { ref } from 'vue'

const isMenuOpen = ref(false)
</script>
