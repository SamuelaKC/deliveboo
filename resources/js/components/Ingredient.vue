<template>
<div>
    <img src="" alt="">  
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">Ingredient</label>
    </div>
    <button v-on:click="viewIngredient()" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Chiudi
    </button>

</div>
</template>

<script>
    
    export default {
        name: 'Ingredient',
        data() {

        },
        
        methods: {

        }
    }
</script>