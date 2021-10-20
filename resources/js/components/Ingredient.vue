<template>
  <div class="background-opacity row">
    <div class="carta-ingredienti col-4">
      <div class="ingredient-box">
        <button
          @click="$emit('closeModal')"
          class="btn btn-danger btn-sm button-close"
        >
          <i class="fa fa-times"></i>
        </button>
        <div v-if="plateImg.length > 0" class="img-container">
          <img :src="`storage/${plateImg}`" alt="foto piatto" />
          <!--ToDO da sistemare l'src-->
        </div>

        <div v-if="ingredients.length > 0" class="check-ingredient">
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
            <label
              :for="`ingredient-${ingredient.id}`"
              class="form-check-label"
            >
              {{ ingredient.name }}
            </label>
          </div>
        </div>
        <div class="quantity-box">
          <span @click="$emit('plusQuantity')">
            <i class="fa fa-plus-circle"></i>
          </span>
          <input type="text" v-model="quantityOfPlate" class="input-quantity" />
          <span @click="$emit('minusQuantity')">
            <i class="fa fa-minus-circle"></i>
          </span>
        </div>
        <button
          v-if="!showAdvisor"
          @click="$emit('sendIn', plateId)"
          class="btn btn-bluegreen"
        >
          Aggiungi al Carrello
        </button>

        <div v-if="showAdvisor" class="ingredient-box">
          <div class="quantity-box">Se continui svuoterai il carrello!!!</div>
          <div>
            <button @click="$emit('closeAdvisor')" class="btn btn-danger">
              Chiudi
            </button>
            <button
              @click="$emit('removeAndSend', plateId)"
              class="btn btn-bluegreen"
            >
              Continua
            </button>
          </div>
        </div>
      </div>
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
    this.getScroll();
  },
  props: {
    ingredients: Array,
    plateId: Number,
    quantityOfPlate: Number,
    plateImg: String,
    showAdvisor: Boolean,
    showIngredient: Boolean,
  },

  methods: {
    closeAdvisor() {
      this.$emit("closeAdvisor");
    },
  },
};
</script>