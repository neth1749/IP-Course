import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useMessageStore = defineStore("message", {
  state: () => ({
    messageP1: "", // Shared state
    messageP2: "", // Shared state
    messageP3: "", // Shared state
    
  }),
});