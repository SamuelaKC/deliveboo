<template>
  <div class="col-6 col-md-4">
    <div
      class="plate"
      @click="$emit('viewIngredient', { id: plate.id, img: plate.picture })"
    >
    <div v-if="plate.available" class="row">
        <div class="col-7">
            <div>{{ plate.name }}</div>
            <div>{{ plate.description }}</div>

        </div>
        <div class="col-5">
            <img :src="plate.picture" alt="">
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