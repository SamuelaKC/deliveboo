<template>
  <div class="col-lg-8">
    <img src="" alt="" />
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
      <div @click="$emit('plusQuantity')"><i class="fa fa-plus-circle"></i></div>
      <input type="text" v-model="quantityOfPlate" />
      <div @click="$emit('minusQuantity')"><i class="fa fa-minus-circle"></i></div>
    </div>
    <button @click="$emit('sendIn', plateId)">Aggiungi al Carrello</button>

    <button
      @click="$emit('closeModal')"
      type="button"
      class="btn btn-secondary"
      data-bs-toggle="modal"
      data-bs-target="#staticBackdrop"
    >
      Chiudi
    </button>
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
  },
};
</script>