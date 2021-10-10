<template>
    <div class="container">
        <Plates />
        <HomeRestaurants/>
        <Restaurant/>
        <CreateOrder />
    </div>
</template>

<script>
import Plates from './Plates.vue';
import HomeRestaurants from './HomeRestaurants.vue';
import CreateOrder from './CreateOrder.vue';
import Restaurant from './Restaurant.vue';
    export default {
        components : {
            Plates,
            HomeRestaurants,
            CreateOrder,
            Restaurant
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