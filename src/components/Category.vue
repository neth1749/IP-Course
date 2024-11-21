<template>
    <div>
      <h1>Categories</h1>
      <div class="categories-container">
        <Category
          v-for="category in categories"
          :key="category.id"
          :image="category.image"
          :title="category.name"
          :quantity="category.quantity"
        />
      </div>
    </div>
  </template>
  
  <script>
  import { useProductStore } from "@/stores/product";
  import Category from "@/components/Category.vue";
  
  export default {
    components: { Category },
    setup() {
      const productStore = useProductStore();
  
      // Fetch categories when this component is mounted
      productStore.fetchCategories();
  
      return {
        categories: productStore.categories,
      };
    },
  };
  </script>
  
  <style>
  .categories-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 10px;
  }
  </style>
  