<script>
import axios from 'axios';
import ButtonComponent from './components/ButtonComponent.vue';
import CategoryComponent from './components/CategoryComponent.vue';
import PromotionComponent from './components/PromotionComponent.vue';
import {useProductStore} from './Product_Store.js'
import { mapState } from 'pinia';
export default{
  name: 'App',
  setup() {
    const store = useProductStore()
    return {
      store
    }
  },
  components:{
    ButtonComponent,
    CategoryComponent,
    PromotionComponent
  },
  data() {
    return {
    
    }
},
  computed: {
    ...mapState(useProductStore, {
      Categories: 'categories'
    })
  },

  async mounted () {
          // Mounted life cycle - It will be executed every time
          // this component is loaded
        await this.store.fetchCategories()
        //console.log('categories', this.store.categories)

     }
}
</script>

<template>

  <div class="category">
    <template v-for="category in Categories">
      <CategoryComponent :name="category.name" :amount="category.productCount" :color="category.color" :image="category.image"></CategoryComponent>
    </template>
  </div>
  <div class="promotion">
    <template v-for="promotion in Promotions">
      <PromotionComponent :title="promotion.title" :color="promotion.color" :btnColor="promotion.buttonColor" :image="promotion.image"></PromotionComponent>
    </template>
  </div>
  
  <div>helloworld</div>
</template>

<style scoped>
.category{
  padding-top: 20px;
  margin: auto;
  width: 90%;
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  gap: 10px;
  /* overflow-x: auto; */
}
.promotion{
  padding-top: 40px;
  margin: auto;
  width: 90%;
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  gap: 10px;
}
</style>