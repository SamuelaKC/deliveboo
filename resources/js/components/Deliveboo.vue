<template>
  <div class="py-4">
    <Header @viewHomeRestaurant="showHomeRestaurant" @search="searchItem"/>

    <HomeRestaurants @viewRestaurant="showRestaurant" v-if="show.home" :users="users" :allRestaurant="allRestaurant" @restaurantTag="restaurantTag"/>
    <Restaurant
      v-else
      :restaurant="restaurant"
     
      
    />
  </div>
</template>

<script>
import HomeRestaurants from "./HomeRestaurants.vue";
import Restaurant from "./Restaurant.vue";
import Header from "./Header.vue";
export default {
  components: {
    HomeRestaurants,
    Restaurant,
    Header,
  },
  data() {
    return {
      show: {
        home: true,
      },
      users: [],
      restaurant: [],
      allRestaurant: false,
    };
  },
  created() {
    this.getAllRestaurants();
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

    getAllRestaurants() {
      axios.get("/api/users").then((response) => {
      this.users = response.data.data;
      this.allRestaurant = true;
      console.log(this.users);
    });
    },

    searchItem(string) {
      let apiString = '';
      if(string.trim().length === 0) {
        apiString = `/api/users`;
      } else {
        apiString = `/api/users?query=${string}`
      }

      axios.get(apiString).then((res) => {
        this.users = res.data.data;
        this.show.home = true;
        this.saveShow();
      });
    },

    showHomeRestaurant() {
      this.getAllRestaurants();
      this.show = {
        home: true,
      };
      this.saveShow();
    },

    saveShow() {
      const showJson = JSON.stringify(this.show);
      localStorage.setItem("showHome", showJson);
    },

    saveRestaurant() {
      const restaurantJson = JSON.stringify(this.restaurant);
      localStorage.setItem("restaurant", restaurantJson);
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

    restaurantTag(tagId) {
      axios.get(`/api/tag/${tagId}`).then((response) => {
        this.users = response.data.data.user;
        //this.flagTag = true; 
      });
    }
  },
};
</script>
