<template>
  <div class="col-lg-4">
    <div class="form-content carrello">
      <h4>Carrello</h4>
      <!-- 1 -->
      <div v-for="(plate, index) in cart" :key="plate.id" class="items">
        <div class="quantity">
          <span @click="$emit('plusCartQuantity', index)"><i class="fa fa-plus-circle"></i></span>
          {{ plate.quantity }}x
          <span @click="$emit('minusCartQuantity', index)"><i class="fa fa-minus-circle"></i></span>
        </div>
        <div class="name-plate">
          {{ plate.name }}
        </div>
        <div class="name-plate">
          {{ plate.details }}
        </div>
        <div class="price">{{ (plate.price * plate.quantity).toFixed(2) }} €</div>
      </div>
      <hr class="separetor" />

      <div class="box-carrello totale">
        <h6>Totale</h6>
        <div class="final-price">{{ totalPrice.toFixed(2) }} €</div>
      </div>

      <button class="btn btn-bluegreen" @click="$emit('getCreateOrder')">Vai alla Cassa</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Cart",
  props: {
    cart: Array,
    totalPrice: Number,
  },
};
</script>