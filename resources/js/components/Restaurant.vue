<template>
  
  <div class="restaurant">
    <!-- <Plate v-for="plate in restaurant.plates" :key="plate.id"/> -->
    <Plate :restaurant="restaurant" />
    <Ingredient v-if="flagModal" />
    <button v-on:click="viewIngredient()" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Aggiungi gli ingredienti al tuo piatto!
    </button>
  </div>

</template>

<script>
import Plate from './Plate.vue';
import Ingredient from './Ingredient.vue';

  export default {
    name: 'Restaurant',
    components: {
      Plate,
      Ingredient,
    },
    data(){

      return {
        restaurant: [],
        flagModal: false,
      }

    },

    created() {
            axios.get('/api/users/13').then((response)=>{
                this.restaurant = response.data.data;
                console.log(response.data);
            });
    },
    methods: {
            viewIngredient() {
                // console.log('ciao');
                this.flagModal = !this.flagModal
            }
    }
  };
</script>