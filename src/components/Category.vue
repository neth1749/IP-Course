<script>
export default {
    name : "Category",
    props: {
        image: {
            type: String, 
        },
        title: {
            type: String,
        },
        quantity: {
            type: Number,
          
        },
    },

}

</script>

<template>
    
    <article class="each_category">
        <img :src="image" alt="image">

        <h4 class="title_product">
            {{ title }}
        </h4>
        <span>{{ quantity }} Items</span>
    </article>


</template>

<style>
.each_category {
    width: 8.25rem;
    height: 10rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0.5rem;
    border-radius: 0.45rem;
    gap: 0.05rem;
    box-shadow: 5px 5px 5px rgba(222, 222, 222, 0.1);
    border: none;
    
}
.each_category:hover{
    border: 1.6px solid #81B13D;
    outline: none; 
}

.each_category img {
    width: 6rem;
    height: 6rem;
}

.each_category span {
    font-size: small;
    color: rgb(124, 132, 138);
}

.each_category .title_product {
    margin-top: 0.5rem;
}
</style>