import HomeVue from "./Views/HomeVue.vue";
import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeVue,
    },

    // {
    //   path: "/categories/:categoryID",
    //   name: "Categories",
    //   component: () => import("@/Views/ProductCategories.vue"),
    // },
    // {
    //   path: "/products/:productID",
    //   name: "Products",
    //   component: () => import("./Components/getProductByGroup.vue"),
    // },
  ],
});

export default router;
