<template>
    <div class="product">
      <img :src="product.image" alt="Product Image" />
      <h4>{{ product.name }}</h4>
      <p>Price: ${{ product.price }}</p>
      <p>Sold: {{ product.countSold }}</p>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      product: {
        type: Object,
        required: true,
      },
    },
  };
  </script>
  
  <style>
  .product {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
  }
  .product img {
    width: 100px;
    height: 100px;
    object-fit: cover;
  }
  </style>
  