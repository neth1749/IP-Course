<template>
  <div>
    <h1>Popular Products</h1>
    <ul>
      <li v-for="product in popularProducts" :key="product.id">
        {{ product.name }} - Sold: {{ product.countSold }}
      </li>
    </ul>
  </div>
</template>

<script>
import { useProductStore } from "@/stores/product"; // Adjust the path as needed

export default {
  computed: {
    // Access the getter through the store
    popularProducts() {
      const store = useProductStore();
      return store.getPopularProducts; // Accessing the getter
    },
  },
  mounted() {
    const store = useProductStore();
    store.fetchProduct(); // Fetch products (or any necessary data)
  },
};
</script>