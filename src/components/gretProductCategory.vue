<template>
    <div>
      <h1>Products by Category with category id = 1</h1>
      <ul>
        <!-- Loop through products with categoryId = 1 -->
        <li v-for="product in getProductsByCategory(1)" :key="product.id">
          {{ product.name }} - Price: ${{ product.price }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import { useProductStore } from "@/stores/product"; // Import the store
  
  export default {
    computed: {
      // Access the categories directly from the store
      categories() {
        const store = useProductStore();
        return store.categories; // Directly return categories from state
      },
  
      // Method to fetch products based on category id
      getProductsByCategory() {
        const store = useProductStore();
        return store.getProductsByCategory; // Access the getter
      },
    },
    mounted() {
      const store = useProductStore();
      // Fetch categories and products when the component is mounted
      store.fetchCategory();
      store.fetchProduct();
    },
  };
  </script>