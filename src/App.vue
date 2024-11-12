<script>
import Category from './components/Category.vue';
import Promotion from './components/Promotion.vue';

import image1 from './assets/img/image1.png'; 
import image2 from './assets/img/image2.png';

import Csm_1 from './assets/img/Cms_1.jpg';
import Csm_2 from './assets/img/Cms_2.png';
import Csm_3 from './assets/img/Cms_3.jpg';

import axios from "axios";

export default {
  name: "App",
  components: {
    Category,
    Promotion,
  },
  data() {
    return {
      categories: [], 
      promotions: [], 
    };
  },
  mounted() {
    this.fetchCategories();
    this.fetchPromotions(); 
  },
  methods: {
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
  },
};
</script>
<template>


  <main class="main_content">
    <div class="category_container">
      <Category v-for="product in this.Data_Contegory" :key="product.Title" :style="product.Style" :image="product.Img"
        :title="product.Title" :quantity="product.Quantity" />

    </div>
    <div class="Promotion_container">
      <Promotion v-for="promotion in Data_promotion" 
      :style="promotion.Style"
      :key="promotion.content"
      :Image="promotion.promotion_image"
      :content="promotion.content"
      />

    </div>

  </main>

</template>

<style>
.main_content {
  min-height: 100vh;
  padding-bottom: 2rem;
  display: flex;
  flex-direction: column;
  align-items: center;


}

.main_content .category_container {
  gap: 1.2rem;
  width: 100%;
  padding: 1rem;
  display: grid;
  place-items: center;
  grid-template-columns: repeat(auto-fit, minmax(6.5rem, 1fr));
  height: auto;
}
.main_content .Promotion_container{
  width: 96%;
  height: auto;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(27rem, 1fr));
  place-items: center;
  row-gap: 1rem;
}

</style>
