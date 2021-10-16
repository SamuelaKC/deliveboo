<template>
  <div class="col-lg-8">
    <div class="form-content">
      <h1 class="font-header">Dettagli dell'ordine</h1>
      <form @submit.prevent="sendOrder">
        <!-- nome e cognome -->
        <div class="form-group">
          <label for="name_surname"></label>
          <input
            type="text"
            placeholder="Nome e Cognome"
            class="form-control"
            name="name_surname"
            id="name_surname"
            v-model="order.name_surname"
          />
        </div>
        <!-- address(via di casa) -->
        <div class="form-group">
          <label for="address"></label>
          <input
            type="text"
            placeholder="Indirizzo, numero civico, Cap Paese Provincia"
            class="form-control"
            name="address"
            id="address"
            v-model="order.address"
          />
        </div>
        <!-- numero del telefono -->
        <div class="form-group">
          <label for="phone_number"></label>
          <input
            type="tel"
            placeholder="Numero di telefono (+39...)"
            class="form-control"
            name="phone_number"
            id="phone_number"
            v-model="order.phone_number"
          />
        </div>
        <!-- dettagli -->
        <div class="form-group">
          <label for="details"></label>
          <input
            type="text"
            placeholder="Istruzioni per il rider"
            class="form-control"
            name="details"
            id="details"
            v-model="order.details"
          />
        </div>
        <!-- prezzo totale -->
        <div class="form-group">
          <div class="prezzo-totale">Totale: {{ totalPrice }} €</div>
        </div>

        <button type="submit" class="btn btn-bluegreen">Invia ordine</button>
      </form>
      <!-- Parte del pagamento solo view al momento...  -->
      <Braintree :newOrderId="newOrderId"/>
    </div>
  </div>
  <!-- Carrello... -->
</template>

<script>
import Braintree from "./Braintree.vue";
export default {
  components: { Braintree },
  name: "CreateOrder",
  data() {
    return {
      order: {},
      authorization: "",
      newOrderId: null,
    };
  },
  computed: {
    apiOrder() {
      return {
        name_surname: this.order.name_surname,
        details: this.order.details,
        address: this.order.address,
        phone_number: this.order.phone_number,
        plates: this.platesData,
        total_price: this.totalPrice,
      };
    },

    platesData() {

      let arrayPlate = [];

      this.cart.forEach(plate => {
        arrayPlate.push(
          {
            id: plate.id,
            quantity: plate.quantity,
          }
        );
      });
      return arrayPlate;
    }
  },
  props: {
    cart: Array,
    totalPrice: Number,
  },
  // created() {
  //   axios.get("/api/payment/generate").then((response) => {
  //     this.authorization = response.data.token;
  //     console.log(this.authorization);
  //   });
  // },
  // async mounted() {
  //   let response = await axios.get("/api/payment/generate");
  //   this.authorization = response.data.token;
  //     console.log(this.authorization);

  // },
  methods: {
    // Ora mi serve la chiamata axios per salvare i dati nello store
    sendOrder() {
      console.log("invio");
      axios
        .post("api/orders", this.apiOrder)
        .then((response) => {
          this.newOrderId = response.data.order;
          alert("ho salvato tutto");
        })
        .catch((e) => {
          console.error(e);
        });
    },
  },
};
</script>
