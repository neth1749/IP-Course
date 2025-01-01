<!-- Menu.vue -->
<template>
    <nav>
      <h2>Header</h2>
      <ul>
        <li>
          <router-link to="/page1" :class="{ active: isActive('/page1') }"
            >Page 1</router-link
          >
        </li>
        <li>
          <router-link to="/page2" :class="{ active: isActive('/page2') }"
            >Page 2</router-link
          >
        </li>
        <li>
          <router-link to="/page3" :class="{ active: isActive('/page3') }"
            >Page 3</router-link
          >
        </li>
      </ul>
    </nav>
  </template>
  
  <script>
  import { useRoute } from "vue-router";
  
  export default {
    name: "Menu",
    setup() {
      const route = useRoute();
      const isActive = (path) => route.path === path;
      return { isActive };
    },
  };
  </script>
  
  <style>
  
  .active {
    color: red;
    font-weight: bold;
  }
  
  nav {
    display: flex;
    height: 4rem;
    width: 100%;
    justify-content: space-between;
    align-items: center;
    background-color: #f4f4f4;
    border-bottom: 1px solid #ccc;
  }
  ul {
    display: flex;
    list-style: none;
  }
  li {
    padding: 0.7rem;
  }
  </style>
  