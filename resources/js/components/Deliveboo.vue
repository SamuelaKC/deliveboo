<template>
  <div class="">
    <div class="container">
      <button @click="showHomeRestaurant" class="btn btn-secondary">HOME</button>
      <HomeRestaurants @viewRestaurant="showRestaurant" v-if="show.home"/>
      <Restaurant v-else :resaturantId="restaurantId" :restaurant="restaurant"/>
    </div>
  </div>

  <!-- <HomeRestaurants/>
        <Restaurant/> -->
</template>

<script>
import HomeRestaurants from "./HomeRestaurants.vue";
import Restaurant from "./Restaurant.vue";

export default {
  components: {
    HomeRestaurants,
    Restaurant,
  },
  data() {
    return {
      show: {
        home:true,
        //restaurantId: null,
      },
      restaurant: [],
    };
  },
  created() {
    this.getLocalStore();
  },
  methods: {
    showRestaurant(restaurantId) {
    axios.get(`/api/users/${restaurantId}`).then((response) => {
      this.restaurant = response.data.data;
      this.show.home = false;
      this.saveShow();
      this.saveRestaurant();
    });
    //this.restaurantId = restaurantId;
    },

    showHomeRestaurant() {
      this.show.home = true;
      this.saveShow();
    },

    saveShow() {
      const showJson = JSON.stringify(this.show);
      localStorage.setItem('showHome', showJson);
    },

    saveRestaurant() {
      const restaurantJson = JSON.stringify(this.restaurant);
      localStorage.setItem('restaurant', restaurantJson);
    },

    getLocalStore() {
      //leggo il carrello dal local storage
      if (localStorage.getItem("cart")) {
        //provo il mio blocco di codice per verificarlo
        try {
          //leggo il carrello del local storage e lo trasformo in un ogetto js
          this.cart = JSON.parse(localStorage.getItem("cart"));
        } catch (e) {
          //se dovesse dare errore il blocco di codice eseguo il catch
          localStorage.removeItem("cart");
        }
      }

      if (localStorage.getItem("showHome")) {
        try {
          this.show = JSON.parse(localStorage.getItem("showHome"));
        } catch (e) {
          localStorage.removeItem("showHome");
        }
      }

      if (localStorage.getItem("restaurant")) {
        try {
          this.restaurant = JSON.parse(localStorage.getItem("restaurant"));
        } catch (e) {
          localStorage.removeItem("restaurant");
        }
      }
    },
  },
};
</script>
