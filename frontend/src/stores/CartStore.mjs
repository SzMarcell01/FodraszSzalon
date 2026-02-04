import { defineStore } from 'pinia'

export const useCartStore = defineStore('card-store', {
  state() {
    return {
      item: []
    }
  },

})