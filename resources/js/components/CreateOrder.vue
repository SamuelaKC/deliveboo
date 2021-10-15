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
      
    </div>
  </div>
  <!-- Carrello... -->
</template>

<script>
export default {
  name: "CreateOrder",
  data() {
    return {
      order: {},
    };
  },
  computed: {
    apiOrder() {
      return {
        name_surname: this.order.name_surname,
        details: this.order.details,
        address: this.order.address,
        phone_number: this.order.phone_number,
        plates: this.cart,
        total_price: this.totalPrice,
      };
    },
  },
  props: {
    cart: Array,
    totalPrice: Number,
  },
  created() {
    // Parte del pagamento solo view:
    var button = document.querySelector("#submit-button");

    braintree.dropin.create(
      {
        authorization: "sandbox_g42y39zw_348pk9cgf3bgyw2b",
        selector: "#dropin-container",
      },
      function (err, instance) {
        if (err) {
          // An error in the create call is likely due to
          // incorrect configuration values or network issues
          return;
        }

        button.addEventListener("click", function () {
          instance.requestPaymentMethod(function (err, payload) {
            if (err) {
              // An appropriate error will be shown in the UI
              return;
            }

            // Submit payload.nonce to your server
          });
        });
      }
    );
    // ---------------------------------------------------------------
    this.price();
  },
  methods: {
    // Ora mi serve la chiamata axios per salvare i dati nello store
    sendOrder() {
      console.log("invio");
      axios
        .post("api/orders", this.apiOrder)
        .then((response) => {
          console.log(response.data);
          alert("ho salvato tutto");
        })
        .catch((e) => {
          console.error(e);
        });
    },
  },
};
</script>
