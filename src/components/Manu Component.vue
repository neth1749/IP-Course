<template>
    <div class="menu">
      <h3>{{ groupName }}</h3>
      <ul>
        <li v-for="category in categories" :key="category.id">
          {{ category.name }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import { useProductStore } from "@/stores/product";
  
  export default {
    props: {
      groupName: {
        type: String,
        required: true,
      },
    },
    setup(props) {
      const store = useProductStore();
      const categories = store.getCategoriesByGroup(props.groupName);
  
      return { categories };
    },
  };
  </script>
  
  <style>
  .menu {
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 20px;
  }
  </style>
  