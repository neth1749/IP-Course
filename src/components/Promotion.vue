<template>
    <div
      :style="{
        backgroundColor: color,
      }"
      class="promotion-banner"
    >
      <div class="Banner-content">
        <h2>{{ title }}</h2>
        <shop-button :bg-btn-color="buttonColor" :message="title" />
      </div>
      <div class="bannerImg">
        <img
          :src="'http://localhost:3000/' + image"
          :alt="title"
          class="banner-image"
        />
      </div>
    </div>
  </template>
  
  <script>
  import ShopButton from "./ShopButton.vue";
  
  export default {
    components: {
      ShopButton,
    },
    props: {
      title: String,
      image: String,
      color: String,
      buttonColor: String,
      url: String,
    },
  
    data() {
      return {
        isHovered: false,
      };
    },
  };
  </script>
  
  <style scoped>
  .Banner-content {
    width: inherit;
    height: 60%;
    display: flex;
    flex-direction: column;
    gap: 0.9rem;
    justify-content: space-between;
  }
  .promotion-banner {
    display: flex;
    flex-direction: row;
    align-items: center;
    width: 28rem;
    height: 18rem;
    padding: 10px;
    background-color: #f9f9f9;
    border-radius: 8px;
    margin: 5px;
    transition: all 0.1s ease-in;
  }
  
  .bannerImg {
    /* width: 300px; */
    height: 300px;
    display: flex;
    align-items: end;
  }
  .banner-image {
    width: 180px;
    height: 180px;
    /* object-fit: cover; */
    margin-right: 20px;
  }
  .banner-content {
    flex: 1;
  }
  .promotion-banner:hover {
    border: 2px solid rgb(142, 219, 152);
    transform: scale(1.02111);
    transition: 0.2s;
  }
  
  button {
    width: 50%;
    display: flex;
    align-items: center;
    gap: 0.3rem;
    justify-items: center;
    padding: 8px 16px;
    color: white;
    /* background-color: #36b37e; */
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  </style>