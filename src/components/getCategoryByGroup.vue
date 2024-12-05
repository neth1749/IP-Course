<template>
    <div>
      <h1>Products group = fruits</h1>
      <ul>
        <!-- Loop through products with group = fruits -->
        <li v-for="product in getCategoryByGroup" :key="product.id">
          {{ product.name }} - product count: {{ product.productCount }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import { useProductStore } from "@/stores/Product"; // Import the store
  
  export default {
    data() {
      return {
        groupName: "fruits", // Set your group name here
      };
    },
    computed: {
      // Access the categories directly from the store
  
      // Method to fetch products based on group
      getCategoryByGroup() {
        const store = useProductStore();
  
        // Use store's getter to filter products by group
        return store.getCategoriesByGroup(this.groupName);
      },
    },
    mounted() {
      const store = useProductStore();
      // Fetch categories and products when the component is mounted
      store.fetchCategory();
    },
  };
  </script>