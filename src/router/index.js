import { createRouter, createWebHistory } from "vue-router";
import Page1 from "@/components/Page1.vue";
import Page2 from "@/components/Page2.vue";
import Page3 from "@/components/Page3.vue";
import Page1_Section1 from "@/components/Page1_Section1.vue";

import Page1_Section3 from "@/components/Page1_Section3.vue";


import Page2_Section1 from "@/components/Page2_Section1.vue";
import Page2_Section2 from "@/components/Page2_Section2.vue"; 
import Page2_Section3 from "@/components/Page2_Section3.vue"; 


import Page3_Section1 from "@/components/Page3_Section1.vue";
import Page3_Section2 from "@/components/Page3_Section2.vue";



const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      redirect: "/page1",
    },
    {
      path: "/page1",
      component: Page1,
      children: [
        { path: 'section1', component: Page1_Section1 },
        { path: 'section2', component:()=> import(`../components/Page1_Section2.vue`) },
        { path: 'section3', component: Page1_Section3 },
        {path: 'section4', component: ()=> import('@/components/Page1_Section4.vue')},


      ],
    },
    {
      path: "/page2",
      component: Page2,
      children: [
        { path: 'section1', component: Page2_Section1 },
        { path: 'section2', component: Page2_Section2 },
        { path: 'section3', component: Page2_Section3 },
        {path: 'section4', component: ()=> import('@/components/Page2_Section4.vue')},

      ],
    },
    {
      path: "/page3",
      component: Page3,
      children: [
        { path: 'section1', component: Page3_Section1 },
        { path: 'section2', component: Page3_Section2 },
        { path: 'section3', component: ()=> import('@/components/Page3_Section3.vue') },
        {path: 'section4', component: ()=> import('@/components/Page3_Section4.vue')},

      ],
    },
  ],
});

export default router;
