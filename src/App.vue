
<script>
import Menu from './components/Menu.vue'
import { RouterView } from 'vue-router';
import Footer from './components/Footer.vue';
export default{
  components: {
    Menu,
    Footer,
  }
}
</script>

<template>


<div class="main-layout">
  <Menu/>
  <RouterView/>
  <Footer/>
  
</div>

</template>

<style scoped>
.main-layout {
  display: flex;
  flex-direction: column;
  padding:1rem ;
  min-height: 100vh;
}

</style>
