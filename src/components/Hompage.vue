<template>
    <div class="container">
      <section class="Header-section">
        <nav>
          <h1>Header</h1>
          <div class="pageNavigator">
            <router-link
              class="link"
              to="/page1"
              :class="{ active: $route.path === '/page1' }"
              >Page1</router-link
            >
            <router-link
              class="link"
              to="/page2"
              :class="{ active: $route.path === '/page2' }"
              >Page2</router-link
            >
            <router-link
              class="link"
              to="/page3"
              :class="{ active: $route.path === '/page3' }"
              >Page3</router-link
            >
          </div>
        </nav>
      </section>
  
      <section class="body-section">
        <div class="body-container">
          <div class="menu">
            <div>Menu</div>
            <div>Section1</div>
            <div>Section2</div>
            <div>Section3</div>
            <div>Section4</div>
          </div>
          <div>
            <!-- need to be dynamic -->
  
            <RouterView />
          </div>
        </div>
      </section>
  
      <section class="footer-section">
        <Footer></Footer>
      </section>
    </div>
  </template>
  
  <script>
  import Footer from "./Footer.vue";
  import Page1 from "./Page1.vue";
  import Page2 from "./Page1.vue";
  import Page3 from "./Page3.vue";
  import { RouterView, RouterLink } from "vue-router";
  export default {
    name: "HomePage",
    components: {
      Footer,
      Page1,
      Page2,
      Page3,
    },
  };
  </script>
  
  <style scoped>
  .container {
    border: 1px solid black;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
  }
  .menu {
    border: 1px solid black;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    padding: 1rem;
    background-color: gray;
  }
  .body-container {
    /* background-color: dodgerblue; */
    border: 1px solid black;
    height: 80vh;
    display: flex;
    flex-direction: row;
    gap: 2rem;
  }
  .footer-section {
    /* border: 1px solid black;     */
    display: flex;
    justify-content: center;
  }
  nav {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }
  
  .pageNavigator {
    display: flex;
    gap: 1rem;
    padding: 1rem;
  
  }
  /* .link {
    text-decoration: none;
    color: black;
  } */
  .link.active{
      color:red;
  }
  </style>
  