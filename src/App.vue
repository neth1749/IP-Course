<template>
  <RouterView />
</template>

<script>
// import HomeVue from "./Views/HomeVue.vue";
// import { RouterView } from "vue-router";

export default {
  components: {
    HomeVue,
  },

  data() {
    return {};
  },
};
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  border: 2px solid;
  box-sizing: border-box;

  color: black;
}

html {
  background-color: rgb(255, 255, 255);
}
</style>