<template>
    <div class="container">
        <Plates />
        <HomeRestaurants/>
    </div>
</template>

<script>
import Plates from './Plates.vue';
import HomeRestaurants from './HomeRestaurants.vue';
    export default {
        components : {
            Plates,
            HomeRestaurants,
        },
        data() {
            return {
                plate: [],
            }
        },
        created() {
            axios.get().then((response)=>{
                this.plate = response.data;
                console.log(response.data);
            });
        },
    }
</script>