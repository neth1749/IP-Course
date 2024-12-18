<template>
  <nav class="nav-bar">
    <h1>{{ classify }}</h1>
    <div class="product-classify">
      <!-- <a href="#">All</a>
      <a href="#">Milks & Daries</a>
      <a href="#">Coffe & Teas</a>
      <a href="#">Pet Foods</a>
      <a href="#">Meals</a>
      <a href="#">Vegetables</a>
      <a href="#">Fruits</a> -->

      <template v-for="nav in computedListbar" :key="nav">
        <ul
          @click.prevent="setCurrentNav(nav)"
          :class="[activeTab === nav ? 'bold' : 'regular']"
        >
          {{
            nav
          }}
        </ul>
      </template>
    </div>
  </nav>
</template>
<script>
export default {
  props: {
    classify: String,
    Listbar: [],
  },

  data() {
    return {
      activeTab: "All",
    };
  },
  methods: {
    setCurrentNav(navbar) {
      this.activeTab = navbar;
      this.$emit("changeBar", navbar);
    },
  },
  computed: {
    computedListbar() {
      const newList = [...this.Listbar];
      newList.unshift("All");
      return newList;
    },
  },
};
</script>

<style scoped>
.nav-bar {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-content: center;
}
.product-classify {
  display: flex;
  align-items: center;
  gap: 2rem;
}
ul {
  cursor: pointer;
}
ul:hover {
  color: gray;
}
/* ul {
  display: flex;
  flex-direction: row;
  gap: 24px;
  list-style: none;
  margin: 12px;
}
li{
  text-decoration: none; */
/* } */
.bold {
  font-weight: bold;
}
.regular {
  font-weight: normal;
}
/* 

nav {
  width: 100%;
  display: flex;

  flex-direction: row;
  justify-content: space-between;
}
a {
  text-decoration: none;
  color: black;
}
a:hover {
  color: blue;
}

.product-classify {
  display: flex;
  align-items: center;
  gap: 2rem;
} */
</style>