<template>
    <nav class="w-full flex justify-between items-center p-4 bg-pink-200">
        <div>
            <h1 class="text-xl font-semibold">FodrászSzalon</h1>
        </div>
        <div class="flex gap-10 font-semibold">
            <RouterLink class="" :to="{name: 'main-page'}">
                Rólunk
            </RouterLink>
            <RouterLink class="" :to="{name: 'gallery-page'}">
                Galléria
            </RouterLink>
            <RouterLink class="" to="#">
                Elérhetőségek
            </RouterLink>
            <RouterLink class="" :to="{name: 'reservation-page'}">
                Foglalás
            </RouterLink>
        </div>
    </nav>
</template>

<script>

</script>