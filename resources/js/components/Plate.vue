<template>
    <div class="col-lg-8 plate">

        <div class="" @click="$emit('viewIngredient', plate.id)">
        {{ plate.name }}
    </div>
    
    </div>

</template>


<script>

 
    export default {
        name: 'Plate',
        props: {
            plate: Object,
        },
    
    }
</script>