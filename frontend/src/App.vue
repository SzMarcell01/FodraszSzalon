<script>
import { useServiceStore } from "@/stores/ServiceStore.mjs";
import { useUser } from "@stores/UserStore.mjs";

export default {
  mounted() {
    useServiceStore().getServices();
    useUser().getUsers();
  },
}
</script>

<template>
  <RouterView />
</template>
