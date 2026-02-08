import { defineStore } from 'pinia'
import { http } from '@utils/http.mjs'

export const useWorker = defineStore('worker-store', {
  state() {
    return {
      workers: [],
    }
  },
  actions: {
    async getWorkers(){
        const response = await http.get("/workers");
        this.workers = response.data.data;
    }
  },
})