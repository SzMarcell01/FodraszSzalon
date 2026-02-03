<template>

<div class="relative w-full min-h-screen">
  <nav class="absolute top-0 left-0 w-full z-20">
    <div class="max-w-7xl mx-auto flex justify-between items-center p-8">
      <RouterLink to="/" class="flex items-center">
        <span class="text-4xl font-serif text-white tracking-wider">MolnArt</span>
      </RouterLink>
      
      <ul class="hidden md:flex space-x-10 text-white text-sm uppercase tracking-[0.2em] font-light">
        <li v-for="item in ['Főoldal', 'Galéria', 'Szolgáltatások', 'Csapat', 'Rólunk']" :key="item">
          <a href="#" class="relative group py-2 transition duration-500 hover:text-[#c5b4a2]">
            {{ item }}
            <span class="absolute bottom-0 left-0 w-0 h-[1px] bg-[#c5b4a2] transition-all duration-700 ease-in-out group-hover:w-full"></span>
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="w-full min-h-screen bg-cover bg-center bg-[url('/bg.jpg')]">
    <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
      <div class="text-center text-white px-4">
        <h1 class="text-5xl text-[rgb(181_164_148)] font-bold font-serif mb-4">Fedezd fel az egyedi stílusod!</h1>
      
        <p class="p-3">Nálunk a hajad a kreativitásunk vászna. Trendi, precíz, rád szabott vágások,<br> amik tényleg tükrözik a személyiséged. Foglalj online, és hagyd, hogy a <br> profik megalkossák a tökéletes frizurát.</p>
        
        <button class="border-blak bg-[#c5b4a2] hover:bg-[#c5b4a2] text-black hover:text-white py-3 px-15 rounded-sm transition duration-600 text-sm font-semibold">
          Szolgáltatásaink
        </button>
      </div>
    </div>
  </div>
</div>
  <!--
  
  
  <div class="w-full min-h-screen bg-cover bg-center bg-[url('/bg.jpg')] ">
    <div class=" bg-black/40 min-h-screen">
      <nav class=" max-w-375 mx-auto">
        <div class="flex justify-between p-5">
          <RouterLink to="/" class="flex items-center space-x-3">
            <span class="self-center text-4xl font-semibold text-white">MolnArt</span>
          </RouterLink>
          
          <div class="w-full">
            <ul class="flex flex-col p-4 md:flex-row md:p-0 md:space-x-8">
              <li class="text-white"><a href="#">Főoldal</a></li>
              <li class="text-white"><a href="#">Galéria</a></li>
              <li class="text-white"><a href="#">SzolgáltatásokterLink</a></li>
              <li class="text-white"><a href="#">Csapat</a></li>
              <li class="text-white"><a href="#">Rólunk</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="flex items-center justify-center px-6">
        <div class="text-center text-white">
          <h1 class="text-4xl text-[rgb(181_164_148)] font-bold font-serif">Fedezd fel az egyedi stílusod!</h1>
          <p>Nálunk a hajad a kreativitásunk vászna. Trendi, precíz, rád szabott vágások,<br> amik tényleg tükrözik a személyiséged. Foglalj online, és hagyd, hogy a <br> profik megalkossák a tökéletes frizurát.</p>
        </div>
      </div>
    </div>
    
  </div>
  -->
</template>

<script>

</script>