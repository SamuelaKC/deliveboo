<template>
  <div class="background-opacity">
    <div class="deliveboo-card ingredient-box">
      <button @click="$emit('closeModal')" class="btn btn-danger btn-sm">
        <i class="fa fa-times"></i>
      </button>
      <div class="img-container">
        <img :src="{{ plateImg }}" alt="" /> <!--ToDO da sistemare l'src-->
      </div>
      <div v-if="ingredients.length > 0">
        <div
          v-for="(ingredient, index) in ingredients"
          :key="ingredient.id"
          class="form-check"
        >
          <input
            type="checkbox"
            :id="`ingredient-${ingredient.id}`"
            v-model="ingredient.value"
            @click="$emit('flagAddToCart', index)"
            class="form-check-input"
          />
          <label :for="`ingredient-${ingredient.id}`" class="form-check-label">
            {{ ingredient.name }}
          </label>
        </div>
      </div>
      <div>
        <span @click="$emit('plusQuantity')">
          <i class="fa fa-plus-circle"></i>
        </span>
        <input type="text" v-model="quantityOfPlate" class="input-quantity"/>
        <span @click="$emit('minusQuantity')">
          <i class="fa fa-minus-circle"></i>
        </span>
      </div>
      <button @click="$emit('sendIn', plateId)" class="btn btn-primary">Aggiungi al Carrello</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Ingredient",
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