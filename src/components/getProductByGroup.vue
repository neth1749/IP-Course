<template>
    <div>
      <h1>Get Products by Group {{ groupName }}</h1>
      <ul>
        <li v-for="product in ProductsbyGroup" :key="product.id">
          {{ product.name }} - Sold: {{ product.countSold }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import { useProductStore } from "@/stores/Products"; 
  export default {
    data() {
      return {
        groupName: "fruits", 
      };
    },
    computed: {
      // Access the getter through the store
      ProductsbyGroup() {
        const store = useProductStore();
        return store.getProductsByGroup(this.groupName); 
      },
    },
    mounted() {
      const store = useProductStore();
      store.fetchProduct(); 
    },
  };
  </script>