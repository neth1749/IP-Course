<template>
    <div>
    
      <product-categories />
      <promotion-banners />
    
      <Products></Products>
    </div>
  </template>
  
  <script>
import ProductCategories from "./ProductCategories.vue";
import PromotionBanners from "./PromotionBanners.vue";
import ProductPopular from "./Components/ProductPopular.vue";
import getProductsviaCat from "./Components/getProductVaiCategory.vue";
import getProductByGroup from "./Components/getProductByGroup.vue";
import getCategoryByGroup from "./Components/getCategoryByGroup.vue";
import Menu from "./Components/Menu.vue";
import Products from "./Views/Products.vue";
  import { useProductStore } from "./stores/product";

  
  
  export default {
    setup() {
      const stores = useProductStore();
  
      return { stores };
    },
  
    components: {
      ProductCategories,
      PromotionBanners,
      ProductPopular,
      getProductsviaCat,
      getProductByGroup,
      getCategoryByGroup,
      Menu,
      Products,
    },
    mounted() {
      this.stores.fetchGroup();
    },
  };
  </script>
  <style scoped>
  div {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    padding: 1rem;
  }
  </style>