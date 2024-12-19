import { createRouter, createWebHistory } from "vue-router";
import Hompage from "@/components/Hompage.vue";

import Page1 from "@/components/Page1.vue";
import Page2 from "@/components/Page2.vue";
import Page3 from "@/components/Page3.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/page1",
      name: "Page1",
      component: Page1,
    },
    {
      path: "/page2",
      name: "Page2",
      component: Page2,
    },
    {
      path: "/page3",
      name: "Page3",
      component: Page3,
    },
  ],
});

export default router;
