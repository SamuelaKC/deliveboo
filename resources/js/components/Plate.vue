<template>
    <div>

        <div class="plates" v-for="plate in restaurant.plates" :key="plate.id">
            <!-- Nome piatto: {{ restaurant.plates[1].ingredients }} -->
            <div>Nome piatto: {{ plate.name }} {{ plate.ingredients.name }}</div>
        </div>
    
    </div>

</template>


<script>

 
    export default {
        name: 'Plate',
        props: {
            restaurant: Array
        },

        components: {
            
        },
        data() {
            return {
                plates: [],
                flagModal: true,
            }
        },
        created() {
            axios.get('/api/plates').then((response)=>{
                this.plate = response.data;
                console.log(response.data);
            });
            console.log(this.restaurant);
        },
        methods: {
            viewIngredient() {
                this.flagModal = !this.flagModal
            }
        }
    }
</script>