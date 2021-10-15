<template>
  <div>
    <div id="dropin-container"></div>
    <button class="btn btn-bluegreen" @click="sendPayment">
      Invia Pagamento
    </button>
  </div>
</template>

<script>
export default {
  created() {
    // Parte del pagamento solo view:
    axios.get("/api/payment/generate").then((response) => {
      this.authorization = response.data.token;
      this.dropIn();
    });
  },

  //   props: {
  //     authorization: String,
  //   },

  methods: {
    sendPayment(instance) {
      instance.requestPaymentMethod(function (err, payload) {
        if (err) {
          // An appropriate error will be shown in the UI
          return;
        }
        // Submit payload.nonce to your server
      });
    },

    dropIn() {
      braintree.dropin.create(
        {
          authorization: this.authorization,
          container: "#dropin-container",
          locale: "it_IT",
          card: {
            overrides: {
              fields: {
                number: {
                  placeholder: "1111 1111 1111 1111", // Update the number field placeholder
                },
                postalCode: {
                  minlength: 5, // Set the minimum length of the postal code field
                },
                cvv: {
                    maskInput: true,
                    placeholder: "XXX"
                } 
              },
              styles: {
                input: {
                  "font-size": "18px", // Change the font size for all inputs
                },
                ":focus": {
                  color: "red", // Change the focus color to red for all inputs
                },
              },
            },
          },
        },
        function (err, instance) {
          this.sendPayment(instance);
          if (err) {
            // An error in the create call is likely due to
            // incorrect configuration values or network issues
            return;
          }
        }
      );
    },
  },
};
</script>

