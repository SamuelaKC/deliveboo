<template>
    <div class="">
        <div class="container">
            <!-- <CreateOrder />
            <Cart /> -->
            <Restaurant/>
        </div>
        
        <!-- <HomeRestaurants/> -->
    </div>

    <!-- <HomeRestaurants/>
        <Restaurant/> -->
</template>

<script>
import HomeRestaurants from './HomeRestaurants.vue'
import CreateOrder from './CreateOrder.vue'
import Restaurant from './Restaurant.vue'
import Cart from './Cart.vue'
export default {
  components: {
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
    axios.get().then((response) => {
      this.plate = response.data
      console.log(response.data)
    })
  },
}
</script>
