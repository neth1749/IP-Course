<template>
    <div class="productListwithNav">
      <Menu
        classify="Popular Product"
        :Listbar="stores.groups"
        @changeBar="updateCurrentGroup"
      ></Menu>
      <div class="product-lists">
        <Product
          v-for="(product, index) in filterProducts"
          :key="index"
          :promotionAsPercentage="product.promotionAsPercentage"
          :image="product.image"
          :productGroup="product.group"
          :productName="product.name"
          :rating="product.rating"
          :size="product.size"
          :price="product.price"
        >
        </Product>
      </div>
    </div>
  </template>
  
  <script>
  import Menu from "@/Components/Menu.vue";
  import Product from "@/Components/Product.vue";
  import { useProductStore } from "@/stores/Products.js";
  import { mapState } from "pinia";
  
  export default {
    setup() {
      const stores = useProductStore();
      return { stores };
    },
  
    data() {
      return {
        currentGroupName: "All", // default group name
      };
    },
    components: {
      Product,
      Menu,
    },
    computed: {
      ...mapState(useProductStore, {
        groups: "groups",
        products: "products",
      }),
      filterProducts() {
        if (this.currentGroupName === "All") {
          return this.products;
        }
  
        // return this.stores.getPopularProducts();
  
        return this.stores.getProductsByGroup(this.currentGroupName);
      },
    },
    methods: {
      updateCurrentGroup(groupName) {
        this.currentGroupName = groupName;
        console.log(groupName);
      },
    },
    async mounted() {
      this.stores.fetchGroup();
      this.stores.fetchProduct();
    },
  };
  </script>
  <style scoped>
  .product-lists {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    column-gap: 1rem;
    row-gap: 1rem;
    width: 100%;
  }
  </style>
  
  <!-- next step -->
  <!-- apply add to card button -->
  <!-- getter functions -->