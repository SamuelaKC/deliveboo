<template>
  <div class="col-lg-8">
    <div class="form-content">
      <Braintree v-if="showPayment" :newOrderId="newOrderId" @successPayment="successPayment"/>
      <Success v-if="showSuccess" :messageSuccess="messageSuccess"/>

      <form v-if="showOrder" @submit.prevent="sendOrder">
        <h1 class="font-header">Dettagli dell'ordine</h1>
        <!-- nome e cognome -->
        <div class="form-group">
          <input
            :class="validation.name"
            @focus="noError"
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
          <input
            :class="validation.address"
            @focus="noError"
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
          <input
            :class="validation.phone"
            @focus="noError"
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
          <input
            type="text"
            placeholder="Dettagli dell'ordine"
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

        <button type="submit" class="btn btn-bluegreen">
          Vai al Pagamento
        </button>
      </form>
      <!-- Parte del pagamento solo view al momento...  -->
    </div>
  </div>
  <!-- Carrello... -->
</template>

<script>
import Braintree from "./Braintree.vue";
import Success from './Success.vue';

export default {
  name: "CreateOrder",
  components: {
    Braintree,
    Success,
  },
  data() {
    return {
      order: {},
      newOrderId: null,
      validation: {
        name: "",
        address: "",
        phone: "",
      },
      showOrder: true,
      showSuccess: false,
      showPayment: false,
      messageSuccess: '',
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

      this.cart.forEach((plate) => {
        arrayPlate.push({
          id: plate.id,
          quantity: plate.quantity,
        });
      });
      return arrayPlate;
    },
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
    noError(){
      this.validation = {
        name: "",
        address: "",
        phone: "",
      }
    },

    successPayment(message) {
      this.messageSuccess = message;
      this.showPayment = false;
      this.showSuccess = true;
    },
    // Ora mi serve la chiamata axios per salvare i dati nello store
    sendOrder() {
      console.log(typeof this.order.name_surname);
      if (
        typeof this.order.name_surname === "undefined" ||
        this.order.name_surname.trim().length === 0 ||
        typeof this.order.address === "undefined" ||
        this.order.address.trim().length === 0 ||
        typeof this.order.phone_number === "undefined" ||
        this.order.phone_number.trim().length === 0
      ) {
        if (
          typeof this.order.name_surname === "undefined" ||
          this.order.name_surname.trim().length === 0
        ) {
          this.validation.name = "is-invalid";
        }
        if (
          typeof this.order.address === "undefined" ||
          this.order.address.trim().length === 0
        ) {
          this.validation.address = "is-invalid";
        }
        if (
          typeof this.order.phone_number === "undefined" ||
          this.order.phone_number.trim().length === 0
        ) {
          this.validation.phone = "is-invalid";
        }
      } else {
        axios
          .post("api/orders", this.apiOrder)
          .then((response) => {
            this.newOrderId = response.data.order;
            this.showPayment = true;
            this.showOrder = false;
          })
          .catch((e) => {
            console.error(e);
          });
      }
    },
  },
};
</script>
