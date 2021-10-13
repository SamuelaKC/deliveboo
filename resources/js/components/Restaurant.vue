<template>
  <div class="restaurant">
    <!-- <Plates /> -->
    <Ingredient />
  </div>
</template>

<script>
import Plates from './Plates.vue';
import Ingredient from './Ingredient.vue';

  export default {
    name: 'Restaurant',
    components: {
      Plates,
      Ingredient
    }
  };
</script>