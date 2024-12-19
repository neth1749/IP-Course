<template>
    <nav>
      <h1>Header</h1>
      <div class="pageNavigator">
        <div class="page1">Page1</div>
        <div class="page2">Page2</div>
        <div class="page3">Page3</div>
      </div>
    </nav>
  </template>
  
  <script>
  export default {
    name: "Header",
  };
  </script>
  
  <style scoped>
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
  </style>
  