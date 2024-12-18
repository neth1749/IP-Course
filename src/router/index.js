import GetCategoryByGroup from "@/Components/getCategoryByGroup.vue";
import HomeVue from "@/Views/HomeVue.vue";
import ProductCategories from "@/Views/ProductCategories.vue";


import { createRouter, createWebHistory } from "vue-router";



const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeVue,
    },
    {
      path: "/categories/:categoryID",
      name: "categories",
      component: ProductCategories,
      props: true, // Pass route params as props to the component
    },
    {
      path: "/products/:productID",
      name: "products",
      component: GetCategoryByGroup,
      props: true, // Pass route params as props to the component
    },
  ],
});

export default router;
