<template>
  <RouterView />
</template>
<script>
import { RouterView } from "vue-router";

export default {
  name: "App", // It's a good practice to give a name to your component.
  components: {
    RouterView,
  },
};
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  color: black;
}

html {
  background-color: #ffffff; /* Use hex for consistency */
}
</style>
