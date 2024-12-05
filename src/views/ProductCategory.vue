<template>
    <div class="categories-withNavbar">
      <Menu
        classify="Featured Categories"
        :Listbar="stores.groups"
        @changeBar="updateCurrentGroup"
      ></Menu>
  
      <div class="product-list">
        <ProductCategory
          v-for="(product, index) in filterCategories"
          :key="index"
          :name="product.name"
          :productCount="product.productCount"
          :image="product.image"
          :color="product.color"
        />
      </div>
    </div>
  </template>
  <script>
  import { useProductStore } from "./stores/product";
  
  import ProductCategory from "./Components/productCategory.vue";
  import Menu from "@/Components/Menu.vue";
  
  import { mapState } from "pinia";
  
  export default {
    components: { ProductCategory, Menu },
  
    // run at the first time
  
    setup() {
      const stores = useProductStore();
  
      return { stores };
    },
    data() {
      return {
        currentGroupName: "All", // default group name
      };
    },
    computed: {
      ...mapState(useProductStore, {
        groups: "groups",
        categories: "categories",
      }),
      filterCategories() {
        if (this.currentGroupName === "All") {
          return this.categories;
        }
  
        return this.stores.getCategoriesByGroup(this.currentGroupName);
      },
    },
    methods: {
      updateCurrentGroup(groupName) {
        this.currentGroupName = groupName;
        console.log(groupName);
      },
    },
    async mounted() {
      this.stores.fetchCategory();
      this.stores.fetchGroup();
  
      try {
        console.log("product is popular" + this.stores.getPopularProducts);
      } catch (error) {
        console.log(error);
      }
  
    },
  };
  </script>
  <style scoped>
  .categories-withNavbar {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }
  .product-list {
    display: flex;
    flex-direction: row;
    gap: 1.5rem;
    flex-wrap: wrap;
    /* width: 100vw; */
  
    height: auto;
  }
  .product-image {
    width: 3rem;
    height: 3rem;
    object-fit: cover;
    margin-bottom: 0.2rem;
  }
  </style>