import axios from "axios";
import { defineStore } from "pinia";

export const useProductStore = defineStore("product", {
  state: () => ({
    groups: [],
    categories: [],
    promotions: [],
    products: [],
  }),
  getters: {
    getCategoriesByGroup: (state) => {
      return (groupName) =>
        state.categories.filter((category) => category.group === groupName);
    },
    getProductsByGroup: (state) => {
      return (groupName) =>
        state.products.filter((product) => product.group === groupName);
    },
    getProductsByCategory: (state) => {
      return (categoryId) =>
        state.products.filter((product) => product.categoryId === categoryId);
    },
    getPopularProducts: (state) => {
      return state.products.filter((product) => product.countSold > 10);
    },
  },
  actions: {
    async fetchGroups() {
      try {
        const response = await axios.get("http://localhost:3000/api/groups");
        this.groups = response.data;
      } catch (error) {
        console.error("Error fetching groups:", error);
      }
    },
    async fetchCategories() {
      try {
        const response = await axios.get("http://localhost:3000/api/categories");
        this.categories = response.data;
      } catch (error) {
        console.error("Error fetching categories:", error);
      }
    },
    async fetchPromotions() {
      try {
        const response = await axios.get("http://localhost:3000/api/promotions");
        this.promotions = response.data;
      } catch (error) {
        console.error("Error fetching promotions:", error);
      }
    },
    async fetchProducts() {
      try {
        const response = await axios.get("http://localhost:3000/api/products");
        this.products = response.data;
      } catch (error) {
        console.error("Error fetching products:", error);
      }
    },
  },
});
