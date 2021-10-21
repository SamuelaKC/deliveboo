<template>
  <div class="interline col-12 col-md-6">
    <div
      class="plate"
      @click="$emit('viewIngredient', { id: plate.id, img: plate.picture })"
    >
    <div v-if="plate.available" class="row">
        <div class="col-7">
            <div class="plate-name">{{ plate.name }}</div>
            <div class="plate-description">{{ plate.description }}</div>
            
        </div>
        <div class="col-5">
            <img v-if="plate.picture.length > 0" :src="`storage/${plate.picture}`" :alt="`Foto di ${plate.name}`">
            <div class="plate-price">{{ plate.price.toFixed(2) }}€</div>
        </div>

    </div>
      
    </div>
  </div>
</template>


<script>
export default {
  name: "Plate",
  props: {
    plate: Object,
  },
};
</script>