<template>
  <div class="restaurant row">
    <Ingredient
      v-if="showIngredient"
      :ingredients="ingredients"
      :plateId="plateId"
      :quantityOfPlate="quantityOfPlate"
      @sendIn="sendInCart"
      @plusQuantity="addQuantity"
      @minusQuantity="removeQuantity"
      @flagAddToCart="addToCart"
      @closeModal="closeIngredient"
    />
    <Plate
      v-for="plate in restaurant.plates"
      :key="plate.id"
      :plate="plate"
      @viewIngredient="viewIngredient"
    />
    <Cart
      :cart="cart"
      :totalPrice="totalPrice"
      @plusCartQuantity="addCartQuantity"
      @minusCartQuantity="removeCartQuantity"
    />
  </div>
</template>

<script>
import Plate from "./Plate.vue";
import Ingredient from "./Ingredient.vue";
import Cart from "./Cart.vue";

export default {
  name: "Restaurant",
  components: {
    Plate,
    Ingredient,
    Cart,
  },
  data() {
    return {
      restaurant: [],
      cart: [],
      platesInOrder: [],
      simpleCart: [],
      ingredients: [],
      showIngredient: false,
      plateId: null,
      addingToCart: [],
      quantityOfPlate: 1,
    };
  },

  created() {
    axios.get("/api/users/10").then((response) => {
      this.restaurant = response.data.data;
      console.log(response.data);
      this.getLocalStore();
    });
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
        this.addingToCart.forEach((adding) => {
          stringDetails += `${adding.name}, `;
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
      let selectedPlates = [];
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
    viewIngredient(plateId) {
      console.log("entro");
      this.restaurant.plates.forEach((plate) => {
        if (plateId === plate.id) {
          console.log(plate.ingredients);
          this.ingredients = plate.ingredients;
        }
        this.plateId = plateId;
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
  },
};
</script>