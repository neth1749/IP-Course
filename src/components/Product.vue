<template>
  <div class="card">
    <p
      class="discount"
      v-if="promotionAsPercentage > 0"
      :style="{ backgroundColor: changeColor }"
    >
      <span class="number-discount">{{ changeValue }}</span>
    </p>
    <div class="product-image-container">
      <img
        :src="'http://localhost:3000/' + image"
        alt="Product Image"
        class="product-image"
      />
    </div>

    <div class="product-content">
      <label class="product-group">
        {{ productGroup }}
      </label>

      <h3>{{ productName }}</h3>

      <div class="star-rate">
        <div class="stars">
          <img
            v-for="n in fullStars"
            :key="'full-' + n"
            src="../../public/images/filledStar.png"
            alt="Filled Star"
          />
          <img
            v-for="n in emptyStars"
            :key="'empty-' + n"
            src="../../public/images/empty-star.png"
            alt="Empty Star"
          />
        </div>
        <p class="rate">
          (<span>{{ rating }}</span
          >)
        </p>
      </div>

      <p class="product-size">
        <span class="number-gram">{{ size }}g</span>
      </p>

      <div class="choose">
        <p class="price">
          <span class="after-discount-price"> $ {{ discountedPrice }} </span>
          <span v-if="promotionAsPercentage > 0" class="discount-price"
            >${{ price }}
          </span>
          <!-- {{ price }} -->
        </p>
        <div class="add-section">
          <button v-if="ToggleBtn" class="btn-add" v-on:click="toggleToInput">
            Add <i class="fa-solid fa-plus"></i>
          </button>

          <input
            v-else
            class="input-number"
            type="number"
            min="0"
            v-model.number="inputValue"
            s
            v-on:click="handleInputChange"
          />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    promotionAsPercentage: Number,
    image: String,
    productGroup: String,
    productName: String,
    rating: Number,
    size: Number,
    price: Number,
  },
  data() {
    return {
      ToggleBtn: true,
      inputValue: 0,
    };
  },

  methods: {
    toggleToInput() {
      this.ToggleBtn = false;
    },
    handleInputChange() {
      if (this.inputValue === 0) {
        this.ToggleBtn = true;
      }
    },
  },

  computed: {
    changeValue() {
      if (this.promotionAsPercentage >= 50 && this.promotionAsPercentage < 80) {
        return "Hot";
      } else if (this.promotionAsPercentage >= 80) {
        return "Sale";
      } else {
        return `-${this.promotionAsPercentage} %`;
      }
    },
    fullStars() {
      return Array(Math.floor(this.rating)).fill(1);
    },
    emptyStars() {
      return Array(5 - Math.floor(this.rating)).fill(1);
    },
    discountedPrice() {
      return (this.price * (1 - this.promotionAsPercentage / 100)).toFixed(2);
    },
    changeColor() {
      if (this.promotionAsPercentage >= 50 && this.promotionAsPercentage < 80) {
        return "#FD6E6E";
      } else if (this.promotionAsPercentage >= 80) {
        return "#FDC040";
      } else {
        return "#28E3D7";
      }
    },
  },

  // methods: {
  //   addToCart() {
  //     alert(`Added ${this.productName} to the card.`);
  //   },
  // },
};
</script>
<style scoped>
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
.input-number {
  width: 3rem;
  height: 2rem;
  font-weight: bold;
  color: #109641;
  text-align: center;
}
.card {
  /* display: flex;
  justify-content: center;
  flex-direction: column;
  align-items: center; */
  border: 1px solid green;
  width: 18.2rem;
  height: auto;
  border-radius: 1rem;
  overflow: hidden;
  background-color: white;
  transition: box-shadow 0.3s ease-in-out;
  position: relative;
}
.card:hover {
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}
img {
  width: 17rem;
  height: 10rem;
}
.number-gram {
  color: rgb(112, 112, 112);
}
.discount {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 3rem;
  height: 2rem;
  background-color: #00c4cc;
  border-radius: 0 1rem 1rem 0;
  position: absolute;
  top: 0.9rem;
}
.number-discount {
  font-size: 12px;
  font-weight: bold;
  /* color: white; */
}

.product-image {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 0.6rem;
  padding: 1rem;
  width: 90%;

  border-radius: 0.5rem;
}
.product-group {
  color: rgb(112, 112, 112);
}

.product-image-container {
  width: 100%;

  display: flex;
  justify-content: center;
  align-items: center;
}

.product-content {
  padding: 0.5rem;
  display: flex;
  flex-direction: column;
  gap: 0.3rem;
}
.productName {
  font-size: 1rem;
  color: #333;
  font-weight: bold;
}
.choose {
  display: flex;
  justify-content: space-between;
  padding-left: 1rem;
  padding-right: 1rem;
}
.star-rate {
  display: flex;
  align-items: center;
  gap: 1rem;
}
.stars img {
  width: 1rem;
  height: 1rem;
}
.rate {
  font-size: 1rem;
  color: #888;
}

.price {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  width: auto;
}
.discount-price {
  text-decoration: line-through;
  font-size: 0.9rem;
  color: #888;
}
.after-discount-price {
  font-size: 1.5rem;
  font-weight: bold;
  color: #36b37e;
}
.add-section {
  display: flex;
  flex-direction: row;
  align-items: center;
  margin: 0.8rem 0;
}
.btn-add {
  display: flex;
  align-items: center;
  gap: 0.3rem;
  padding: 0.5rem 0.8rem;
  background-color: #99d9b1;
  /* color: #fff; */
  font-size: 1rem;
  border: none;
  border-radius: 0.3rem;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.input-number {
  display: flex;
  align-items: center;
  gap: 0.4rem;
}
.select-number {
  width: 3rem;
  height: 2rem;
  font-size: 1rem;
  text-align: center;
  border: 1px solid #ccc;
  border-radius: 5px;
}
.btn-adjust {
  background-color: #eee;
  border: 1px solid #ccc;
  width: 30px;
  height: 30px;
  border-radius: 5px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
}
.btn-adjust:hover {
  background-color: #ddd;
}
label {
  display: flex;
  flex-direction: column;
}
</style>