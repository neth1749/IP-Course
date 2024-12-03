import { defineStore } from "pinia";
import axios from "axios";
export const useProductStore = defineStore("product", {
  state: () => ({
    groups: [],
    promotions: [],
    categories: [],
    products: [],
    currProductGroup: "All",
  }),
  getters: {
    /**
     * List all categories by group name
     * @param {string} groupName
     * @returns {Array} List of categories
     */
    getCategoriesByGroup: (state) => {
      return (groupName) => {
        return state.categories.filter(
          (category) => category.group === groupName
        );
      };
    },

    /**
     * List all products by group name
     * @param {string} groupName
     * @returns {Array} List of products
     */
    getProductsByGroup: (state) => {
      return (groupName) => {
        return state.products.filter((product) => product.group === groupName);
      };
    },

    /**
     * List all products by a given categoryId
     * @param {number} categoryId
     * @returns {Array} List of products
     */
    getProductsByCategory: (state) => {
      return (categoryId) => {
        // Filter products by the provided categoryId
        return state.products.filter(
          (product) => product.categoryId === categoryId
        );
      };
    },

    /**
     * List all popular products
     * A product with countSold > 10 is considered popular
     * @returns {Array} List of popular products
     */
    getPopularProducts: (state) => {
      // Log the countSold value of each product for debugging
      state.products.forEach((product) => {
        console.log(product.countSold); // Debugging log
      });

      // Filter and return products with countSold greater than 10
      return state.products.filter((product) => product.countSold > 10);
    },
  },

  actions: {
    fetchCategory() {
      axios
        .get("http://localhost:3000/api/categories")
        .then((response) => {
          console.log(response.data); // Access the data

          this.categories = response.data;
        })
        .catch((error) => {
          console.error("Error fetching data:", error);
        });
    },
    fetchPromotion() {
      axios
        .get("http://localhost:3000/api/promotions")
        .then((response) => {
          console.log(response.data); // Access the data

          this.promotions = response.data;
        })
        .catch((error) => {
          console.error("Error fetching data:", error);
        });
    },
    fetchGroup() {
      axios
        .get("http://localhost:3000/api/groups")
        .then((response) => {
          console.log(response.data); // Access the data

          this.groups = response.data;
        })
        .catch((error) => {
          console.error("Error fetching data:", error);
        });
    },
    fetchProduct() {
      axios
        .get("http://localhost:3000/api/products")
        .then((response) => {
          console.log(response.data); // Access the data

          this.products = response.data;
        })
        .catch((error) => {
          console.error("Error fetching data:", error);
        });
    },
  },
});