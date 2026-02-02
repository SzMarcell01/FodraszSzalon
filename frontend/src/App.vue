<script>
import { useServiceStore } from "@/stores/ServiceStore.mjs";

export default {
  mounted() {
    useServiceStore().getServices();
  },
}
</script>

<template>
  <RouterView />
</template>
