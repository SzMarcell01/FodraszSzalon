<template>
    <div>
        <div v-for="(service, key) in services" :key="key" class="p-4 ml-4 mb-2 w-2xl text-black rounded-sm border-[#44223B] border">
            <div class="flex justify-between">
                <div>
                    <h3 class="font-semibold">{{ service.name }}</h3>
                    <p class="text-gray-400">{{ service.time }}</p>
                </div>
                <div class="flex items-center">
                    <RouterLink to="#" class="border px-4 py-1 rounded-full border-gray-400 transition-colors duration-400 ease-in-out hover:border-green-500 hover:text-green-600 hover:bg-green-50">Részletek</RouterLink>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        services: Object
    }
}
</script>