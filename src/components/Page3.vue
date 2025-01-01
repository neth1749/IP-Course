<!-- Page1.vue -->
<template>
    <div class="container">
      <div class="section">
        <ul>
          <li>
            <router-link
              to="/page3"
              :class="{ active: isActive('/page3') }"
              >Menu</router-link
            >
          </li>
          <li>
            <router-link
              to="/page3/section1"
              :class="{ active: isActive('/page3/section1') }"
              >Section 1</router-link
            >
          </li>
          <li>
            <router-link
              to="/page3/section2"
              :class="{ active: isActive('/page3/section2') }"
              >Section 2</router-link
            >
          </li>
          <li>
            <router-link
              to="/page3/section3"
              :class="{ active: isActive('/page3/section3') }"
              >Section 3</router-link
            >
          </li>
          <li>
            <router-link
              to="/page3/section4"
              :class="{ active: isActive('/page3/section4') }"
              >Section 4</router-link
            >
          </li>
        </ul>
      </div>
      <div class="content">
        <h1>Welcome to Page 3</h1>
  
        <router-view></router-view>
  
  
        <p v-if="store.messageP1.length>0">Message from page1 : {{ store.messageP1}}</p>
        <p v-if="store.messageP2.length>0"> Message from page2 : {{ store.messageP2 }}</p>
        <div class="input-field">
          <label for="input">Message </label>
          <input v-model="store.messageP3" placeholder="Enter your message" />
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { useRoute } from "vue-router";
  import { useMessageStore } from "@/stores/counter";
  export default {
    setup() {
      const route = useRoute();
      const isActive = (path) => route.path === path;
      const store = useMessageStore();
      return { isActive,store };
    },
  };
  </script>
  
  <style scoped>
  .input-field {
    display: flex;
    flex-direction: row;
    gap: 1rem;
    
    align-items: center;
  }
  .active {
    color: red;
    font-weight: bold;
  }
  .container {
    display: flex;
    flex-direction: row;
    height: 80vh;
  }
  .section {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    border: 1px solid #ccc;
  
    width: 20%;
  }
  ul {
    display: flex;
    width: 100%;
  
    flex-direction: column;
  
    border: 1px solid #ccc;
  }
  li {
    border: 1px solid #ccc;
    text-align: center;
  }
  .content {
    display: flex;
    flex-direction: column;
    width: 100%;
    justify-content: center;
    align-items: center;
    gap: 1rem;
  }
  </style>
  