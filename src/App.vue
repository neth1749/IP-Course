<script>
import Category from './components/Category.vue';
import Promotion from './components/Promotion.vue'
import image1 from './assets/img/image1.png';
import image2 from './assets/img/image2.png';
import image3 from './assets/img/image3.png';
import image4 from './assets/img/image4.png';
import image5 from './assets/img/image5.png';
import image6 from './assets/img/image6.png';
import image7 from './assets/img/image7.png';
import image8 from './assets/img/image8.png';
import image9 from './assets/img/image9.png';
import image10 from './assets/img/image10.png';

import Csm_1 from './assets/img/Cms_1.jpg';
import Csm_2 from './assets/img/Cms_2.png';
import Csm_3 from './assets/img/Cms_3.jpg';


export default {
  name: "App",
  components: {
    Category,
    Promotion,
  },
  data() {
    return {
      Data_promotion: [
        {
          content : "Everyday Fresh & Clean with Our Products",
          promotion_image : Csm_1,
          Style : {
            backgroundColor : "#F0E8D5",
          }
        },
        {
          content : "Make your Breakfast Healthy and Easy",
          promotion_image : Csm_2,
          Style : {
            backgroundColor : "#F3E8E8",
          }
        },
        {
          content : "The best Organic Products Online",
          promotion_image : Csm_3,
          Style : {
            backgroundColor : "rgb(229, 234, 239)",
          }
        },


      ],
      Data_Contegory: [
        {
          Img: image1,
          Title: "Cake & Milk",
          Quantity: 14,
          Style: {
            backgroundColor: '#F2FCE4',
          }
        },
        {
          Img: image2,
          Title: "Peach",
          Quantity: 17,
          Style: {
            backgroundColor: '#FFFCEB',
          }
        },
        {
          Img: image3,
          Title: "Oganic Kiwi",
          Quantity: 21,
          Style: {
            backgroundColor: '#ECFFEC',
          }
        },
        {
          Img: image4,
          Title: "Red Apple",
          Quantity: 68,
          Style: {
            backgroundColor: '#FEEFEA',
          }
        },
        {
          Img: image5,
          Title: "Snack",
          Quantity: 34,
          Style: {
            backgroundColor: '#FFF3EB',
          }

        },
        {
          Img: image6,
          Title: "Black plum",
          Quantity: 25,
          Style: {
            backgroundColor: '#FFF3FF',
          }
        },
        {
          Img: image7,
          Title: "Vegetables",
          Quantity: 65,
          Style: {
            backgroundColor: '#F2FCE4',
          }
        },
        {
          Img: image8,
          Title: "Headphone",
          Quantity: 33,
          Style: {
            backgroundColor: '#FFFCEB',
          }
        },
        {
          Img: image9,
          Title: "Cake & Milk",
          Quantity: 54,
          Style: {
            backgroundColor: '#F2FCE4',
          }
        },
        {
          Img: image10,
          Title: "Orange",
          Quantity: 63,
          Style: {
            backgroundColor: '#FFF3FF',
          }
        },
      ],
    }

  },
}


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
