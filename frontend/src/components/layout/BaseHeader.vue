<template>
    <div class="max-w mx-auto h-16 px-6 flex items-center justify-end">
        <div class="w-full flex gap-10 text-2xl justify-end">
            <RouterLink class="" :to="{name: 'main-page'}">
                <p>Rólunk</p>
            </RouterLink>
            <RouterLink class="" :to="{name: 'gallery-page'}">
                <p>Galléria</p>
            </RouterLink>
            <RouterLink class="" :to="{name: ''}">
                <p>Elérhetőségek</p>
            </RouterLink>
            <RouterLink class="" :to="{name: 'reservation-page'}">
                <p>Foglalás</p>
            </RouterLink>
            
        </div>
    </div>
    
</template>

<script>

</script>