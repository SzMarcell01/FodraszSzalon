<template>
    <div>
        <div v-for="service in services" :key="service.id" class="p-4 m-2 w-full text-black rounded-sm border-[#44223B] border">
            <div class="flex justify-between">
                <div>
                    <h3 class="font-semibold">{{ service.name }}</h3>
                    <p class="text-gray-400">{{ service.time }}</p>
                </div>
                <div class="flex items-center">
                    <RouterLink :to="{name: 'services-page'}"  class="border px-4 py-1 rounded-full border-gray-400 transition-colors duration-400 ease-in-out hover:border-[#44223b] hover:text-white hover:bg-[#743b65]">{{ text }}</RouterLink>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        services: Array,
        text: String
    }
}
</script>