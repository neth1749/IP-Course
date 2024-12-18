<template>
    <div class="promotion-banner-list">
      <Promotion
        v-for="(promote, index) in stores.promotions"
        :key="index"
        :title="promote.title"
        :image="promote.image"
        :color="promote.color"
        :buttonColor="promote.buttonColor"
      />
    </div>
  </template>
  
  <script>
  import { useProductStore } from "@/stores/Products.js";
  
  import Promotion from "@/Components/Promotion.vue";
  export default {
    components: { Promotion },
    setup() {
      const stores = useProductStore();
      return { stores };
    },
    data() {
      return {
        promotions: [],
      };
    },
  
    
  
    async mounted() {
      this.stores.fetchPromotion();
      this.stores.fetchGroup();
      console.log("Promotion from api: " + this.stores.promotions);
    },
  };
  </script>
  
  <style scoped>
  .promotion-banner-list {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    width: 100%;
    gap: 2rem;
  }
  </style>