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
  import { useProductStore } from "@/stores/Product"; // Adjust the path as needed
  
  export default {
    data() {
      return {
        groupName: "fruits", // Set your group name here
      };
    },
    computed: {
      // Access the getter through the store
      ProductsbyGroup() {
        const store = useProductStore();
        return store.getProductsByGroup(this.groupName); // Accessing the getter
      },
    },
    mounted() {
      const store = useProductStore();
      store.fetchProduct(); // Fetch products (or any necessary data)
    },
  };
  </script>