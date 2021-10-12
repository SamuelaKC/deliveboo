<template>
    <div class="container">
        <div class="row">
            <CreateOrder />
            <Cart />
        </div>
        <!-- <Plates />
        <HomeRestaurants/>
        <Restaurant/> -->
    </div>
</template>

<script>
import Plates from './Plates.vue';
import HomeRestaurants from './HomeRestaurants.vue';
import CreateOrder from './CreateOrder.vue';
import Restaurant from './Restaurant.vue';
import Cart from './Cart.vue';
    export default {
        components : {
            Plates,
            HomeRestaurants,
            CreateOrder,
            Restaurant,
            Cart,
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