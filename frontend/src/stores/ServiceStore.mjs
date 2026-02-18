import { defineStore } from "pinia";
import { http } from "@utils/http.mjs";

export const useServiceStore = defineStore("service-store", {
  state: () => ({
    services: []
  }),
  actions: {
    async getServices() {
      const response = await http.get("/services");
      this.services = response.data.data;
    }
  }
});
