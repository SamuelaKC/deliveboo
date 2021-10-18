<template>
  <div class="ingredient-box">
    

    <div class="quantity-box">Se continui svuoterai il carrello!!!</div>
    <button
      @click="$emit('closeAdvisor')"
      class="btn btn-danger"
    >
      Chiudi
    </button>
    <button @click="$emit('removeAndSend', plateId)" class="btn btn-bluegreen">
      Continua
    </button>
  </div>
</template>

<script>
export default {
  name: "Advisor",
  mounted() {
    this.ingredients.forEach((ingredient) => {
      ingredient.value = false;
    });
  },
  props: {
    ingredients: Array,
    plateId: Number,
    quantityOfPlate: Number,
    plateImg: String,
  },
};
</script>