<template>
    <div class="col-lg-1 plate">

        <div class="" @click="$emit('viewIngredient', {id: plate.id, img: plate.picture})">
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