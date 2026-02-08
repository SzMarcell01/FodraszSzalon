<script>
import { useServiceStore } from "@/stores/ServiceStore.mjs";
import { useWorker } from "@stores/WorkerStore.mjs";

export default {
  mounted() {
    useServiceStore().getServices();
    useWorker().getWorkers();
  },
}
</script>

<template>
  <RouterView />
</template>
