import { defineStore } from 'pinia'
import { http } from '@utils/http.mjs'

export const useUser = defineStore('worker-store', {
  state() {
    return {
      users: [],
    }
  },
  actions: {
    async getUsers(){
        const response = await http.get("/users");
        this.users = response.data.data;
    }
  },
})