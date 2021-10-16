<template>
  <div class="restaurant container">
    <Ingredient
      v-if="showIngredient"
      :ingredients="ingredients"
      :plateId="plateId"
      :plateImg="plateImg"
      :quantityOfPlate="quantityOfPlate"
      @sendIn="verificationRestaurant"
      @plusQuantity="addQuantity"
      @minusQuantity="removeQuantity"
      @flagAddToCart="addToCart"
      @closeModal="closeIngredient"
    />
    <div class="row">
      <div class="col-12 mb-4">
        <div class="row">
          <div class="restaurant-info col-8">
            <h1 class="restaurant-title">{{ restaurant.name }}</h1>
            <div class="restaurant-description">
              {{ restaurant.description }}
            </div>
            <div class="restaurant-address">
              Indirizzo: {{ restaurant.address }}
            </div>
            <div class="restaurant-number">
              Indirizzo: {{ restaurant.phone_number }}
            </div>
          </div>
          <div class="restaurant-img col-4">
            <img
              :src="restaurant.picture"
              :alt="`Immagine profilo ${restaurant.name}`"
            />
          </div>
        </div>
      </div>

      <Create-order
        v-if="showOrder"
        :cart="cart"
        :totalPrice="totalPrice"
        :showPayment="showPayment"
        @newOrder="newOrder"
        @viewPayment="viewPayment"
      />

      <div class="col-lg-8" v-else>
        <div class="row">
          <Plate
            v-for="plate in restaurant.plates"
            :key="plate.id"
            :plate="plate"
            @viewIngredient="viewIngredient"
          />
        </div>
      </div>

      <Cart
        :cart="cart"
        :totalPrice="totalPrice"
        @plusCartQuantity="addCartQuantity"
        @minusCartQuantity="removeCartQuantity"
        @getCreateOrder="getCreateOrder"
      />
    </div>
  </div>
</template>

<script>
import Plate from "./Plate.vue";
import Ingredient from "./Ingredient.vue";
import Cart from "./Cart.vue";
import CreateOrder from "./CreateOrder.vue";

export default {
  name: "Restaurant",
  components: {
    Plate,
    Ingredient,
    Cart,
    CreateOrder,
  },
  data() {
    return {
      //restaurant: [],
      cart: [],
      ingredients: [],
      showIngredient: false,
      plateId: null,
      addingToCart: [],
      quantityOfPlate: 1,
      plateImg: "",
    };
  },

  props: {
    restaurant: Object,
    showPayment: Boolean,
    showOrder: Boolean,
  },

  created() {
    // console.log(`/api/users/${restautantId}`)
    // axios.get(`/api/users/${restaurantId}`).then((response) => {
    //   this.restaurant = response.data.data;
    //   console.log(response.data);
    //   this.getLocalStore();
    // });
    this.getLocalStore();
  },

  computed: {
    priceAddPlate() {
      let sumAdding = 0;
      if (this.addingToCart.length > 0) {
        this.addingToCart.forEach((adding) => {
          sumAdding += adding.price;
        });
      }
      return sumAdding;
    },
    addDetails() {
      let stringDetails = "";
      if (this.addingToCart.length > 0) {
        this.addingToCart.forEach((adding, index) => {
          if (index + 1 === this.addingToCart.length) {
            stringDetails += `${adding.name}`;
          } else {
            stringDetails += `${adding.name}, `;
          }
        });
      }
      return stringDetails;
    },
    totalPrice() {
      let total = 0;
      if (this.cart.length > 0) {
        this.cart.forEach((plate) => {
          total += plate.price * plate.quantity;
        });
      }
      return total;
    },
  },

  methods: {
    sendInCart(plateId) {
      const flagId = this.verificationPlateId(plateId);
      const flagAdding = this.verificationPlateAdding();

      if (!flagId) {
        console.log(plateId);
        if (!flagAdding) {
          this.cart.forEach((cartPlate) => {
            if (
              plateId === cartPlate.id &&
              this.addDetails === cartPlate.details
            ) {
              cartPlate.quantity++;
            }
          });
        } else {
          this.pushInCart(plateId);
        }
      } else {
        this.pushInCart(plateId);
      }

      //pusho l'id del piatto nel carrello
      //this.cart.push(id);
      //salvo nel local storage

      this.saveCart();
      this.addingToCart = [];
      this.quantityOfPlate = 1;
      this.showIngredient = false;
    },
    saveCart() {
      //trasformo l'oggetto js in un json
      const cartJson = JSON.stringify(this.cart);
      //salvo il file json all'interno del local storage con la chiave cart
      localStorage.setItem("cart", cartJson);
    },
    removeToCart(index) {
      //tolgo un piatto dal carrello
      this.cart.splice(index, 1);
      //salvo nel local storage
      this.saveCart();
    },
    removeAllToCart() {
      //tolgo un piatto dal carrello
      this.cart = [];
      //salvo nel local storage
      this.saveCart();
    },
    countQuantity(id) {
      let quantity = 0;
      this.cart.forEach((plateId) => {
        if (plateId === id) {
          quantity++;
        }
      });
      return quantity;
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
    },
    viewIngredient(plateData) {
      this.plateImg = plateData.img;
      this.restaurant.plates.forEach((plate) => {
        if (plateData.id === plate.id) {
          console.log(plate.ingredients);
          this.ingredients = plate.ingredients;
        }
        this.plateId = plateData.id;
      });
      this.showIngredient = true;
    },
    addToCart(index) {
      this.ingredients[index].value = !this.ingredients[index].value;
      let verifyAdd = [];
      this.ingredients.forEach((ingredient) => {
        if (ingredient.value) {
          verifyAdd.push({
            price: ingredient.price,
            name: ingredient.name,
          });
        }
      });
      this.addingToCart = verifyAdd;
    },
    addQuantity() {
      this.quantityOfPlate++;
    },
    removeQuantity() {
      if (this.quantityOfPlate === 1) {
        this.quantityOfPlate = 1;
      } else {
        this.quantityOfPlate--;
      }
    },
    addCartQuantity(indexCart) {
      this.cart[indexCart].quantity++;
      this.saveCart();
    },
    removeCartQuantity(indexCart) {
      if (this.cart[indexCart].quantity === 1) {
        this.removeToCart(indexCart);
      } else {
        this.cart[indexCart].quantity--;
      }
      this.saveCart();
    },

    closeIngredient() {
      this.showIngredient = false;
    },

    getCreateOrder() {
      //this.showPayment = true;
      this.$emit("viewOrder");
      this.showIngredient = false;
    },

    verificationPlateId(plateId) {
      console.log("ciao");
      let flagPlate = true;

      this.cart.forEach((plate) => {
        if (plateId === plate.id) {
          flagPlate = false;
        }
      });

      return flagPlate;
    },

    verificationPlateAdding() {
      let flagPlate = true;

      this.cart.forEach((plate) => {
        if (this.addDetails === plate.details) {
          flagPlate = false;
        }
      });

      return flagPlate;
    },

    verificationRestaurant(plateId) {
      if (this.cart.length > 0) {
        console.log("carrello pieno");
        let plateInCartId = this.cart[0].id;
        axios.get(`/api/plates/${plateInCartId}`).then((res) => {
          let restaurantId = res.data;
          if (restaurantId !== this.restaurant.id) {
            this.removeAllToCart();
            this.sendInCart(plateId);
          } else {
            this.sendInCart(plateId);
          }
        });
      } else {
        this.sendInCart(plateId);
      }
    },

    pushInCart(plateId) {
      this.restaurant.plates.forEach((plate) => {
        if (plateId === plate.id) {
          this.cart.push({
            id: plate.id,
            name: plate.name,
            details: this.addDetails,
            price: plate.price + this.priceAddPlate,
            quantity: this.quantityOfPlate,
          });
        }
      });
    },

    viewPayment() {
      this.$emit("viewPayment");
    },
  },
};
</script>