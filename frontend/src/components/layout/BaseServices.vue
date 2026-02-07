<template>
    <div id="services" class=" md:h-screen p-6">

        <h2 class="text-4xl font-serif text-[#4a2c40] mb-10">Szolgáltatásaink</h2>
        <div class="flex flex-col md:flex-row gap-8 items-start">
            <div class="w-full md:w-2/3">
                    <ul class="flex flex-col gap-3 mb-8">
                        <li class="border-2 border-[#44223b] w-full rounded-md p-3 flex justify-between items-center">
                            <div>
                                <h3 class="font-sans">Női hajvágás </h3>
                                <p class="font-light">60p</p>
                            </div>
                            <div class="my-auto">
                                <span class="border border-[#929292] rounded-3xl px-2 py-1 hover:bg-gray-400 hover:text-white transition duration-700">Foglalás</span>
                            </div>
                        </li>
                        <li class="border-2 border-[#44223b] w-full rounded-md p-3 flex justify-between items-center">
                            <div>
                                <h3 class="font-sans">Gyermek hajvágás</h3>
                                <p class="font-light">30p</p>
                            </div>
                            <div class="my-auto">
                                <span class="border border-[#929292] rounded-3xl px-2 py-1 hover:bg-gray-400 hover:text-white transition duration-700">Foglalás</span>
                            </div>
                        </li>
                        <li class="border-2 border-[#44223b] w-full rounded-md p-3 flex justify-between items-center">
                            <div>
                                <h3 class="font-sans">Férfi hajvágás</h3>
                                <p class="font-light">45p</p>
                            </div>
                            <div class="my-auto">
                                <span class="border border-[#929292] rounded-3xl px-2 py-1 hover:bg-gray-400 hover:text-white transition duration-700">Foglalás</span>
                            </div>
                        </li>
                        <li class="border-2 border-[#44223b] w-full rounded-md p-3 flex justify-between items-center">
                            <div>
                                <h3 class="font-sans">Konzultáció</h3>
                                <p class="font-light">15p</p>
                            </div>
                            <div class="my-auto">
                                <span class="border border-[#929292] rounded-3xl px-2 py-1 hover:bg-gray-400 hover:text-white transition duration-700">Foglalás</span>
                            </div>
                        </li>
                        <li class="border-2 border-[#44223b] w-full rounded-md p-3 flex justify-between items-center">
                            <div> 
                                <h3 class="font-sans">Alkalmi smink</h3>
                                <p class="font-light">60p</p>
                            </div>
                            <div class="my-auto">
                                <span class="border border-[#929292] rounded-3xl px-2 py-1 hover:bg-gray-400 hover:text-white transition duration-700">Foglalás</span>
                            </div>
                        </li>
                        <li class="border-2 border-[#44223b] w-full rounded-md p-3 flex justify-between items-center">
                            <div>
                                <h3 class="font-sans">Színezés</h3>
                                <p class="font-light">75p</p>
                            </div>
                            <div class="my-auto">
                                <span class="border border-[#929292] rounded-3xl px-2 py-1 hover:bg-gray-400 hover:text-white transition duration-700">Foglalás</span>
                            </div>
                        </li>
                    </ul>
                    <div class="text-center mt-4">
                        <button class="bg-[#44223b] text-white rounded-md px-10 py-3 text-md font-semibold">
                            <h5>Összes megtekintés</h5>
                        </button>
                    </div>
                </div>

                <div class="w-full md:w-1/3 border border-gray-200 shadow-xl rounded-xl p-6 bg-white sticky top-10">
                    <h4 class="text-xl font-bold mb-1">Szolgáltatások</h4>
                    <p class="text-sm text-gray-400 mb-4">Még nincsenek vélemények</p>

                    <button class="bg-[#44223b] text-white rounded-md w-full py-3 mb-6">
                        <h5>Foglalj most</h5>
                    </button>

                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> hétfő</span>
                            <span class="font-mono text-gray-600">08:00 - 19:00</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> kedd</span>
                            <span class="font-mono text-gray-600">08:00 - 19:00</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> szerda</span>
                            <span class="font-mono text-gray-600">08:00 - 19:00</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> csütörtök</span>
                            <span class="font-mono text-gray-600">08:00 - 18:00</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="flex items-center"><span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> péntek</span>
                            <span class="font-mono text-gray-600">08:00 - 18:00</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-400">
                            <span>szombat</span>
                            <span>Zárva</span>
                        </div>
                        <div class="mt-8 pt-4 border-t border-gray-100 flex items-start gap-2">
                            <svg class="w-5 h-5 text-gray-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <p class="text-xs text-gray-600">
                                Budapest, Hajós u. 88, 1066<br>
                                <!-- <RouterLink /> <a href="#" class="text-blue-500 underline">Útbaigazítás megtekintése</a> -->
                            </p>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
        


</template>

<script>

</script>
