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
            v-model="fields.name_surname"
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
            v-model="fields.address"
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
            v-model="fields.phone_number"
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
            v-model="fields.details"
          />
        </div>
        <!-- prezzo totale -->
        <div class="form-group">
          <div class="prezzo-totale">Totale: {{ totalPrice }} €</div>
        </div>

        <button type="submit" class="btn btn-bluegreen">Invia ordine</button>
      </form>
      <!-- Parte del pagamento solo view al momento...  -->
      <br />
      <h3 class="font-header">Metodo di pagamento</h3>
      <div id="dropin-container"></div>
      <button id="submit-button" class="btn btn-bluegreen">
        Compra
      </button>
    </div>
  </div>
  <!-- Carrello... -->
</template>

<script>
export default {
  name: 'CreateOrder',
  data() {
    return {
      fields: {},
      totalPrice: 10.0,
    }
  },
  created() {
    // Parte del pagamento solo view:
    var button = document.querySelector('#submit-button')

    braintree.dropin.create(
      {
        authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
        selector: '#dropin-container',
      },
      function (err, instance) {
        if (err) {
          // An error in the create call is likely due to
          // incorrect configuration values or network issues
          return
        }

        button.addEventListener('click', function () {
          instance.requestPaymentMethod(function (err, payload) {
            if (err) {
              // An appropriate error will be shown in the UI
              return
            }

            // Submit payload.nonce to your server
          })
        })
      },
    )
    // ---------------------------------------------------------------
    this.price()
  },
  methods: {
    // Ora mi serve la chiamata axios per salvare i dati nello store
    sendOrder() {
      axios.post('api/orders', this.fields).then((response) => {
        alert('ho salvato tutto')
      })
    },
    // Per il prezzo fisso da rendere dinamico tramite il carello
    price() {
      this.fields.total_price = this.totalPrice
    },
  },
}
</script>
