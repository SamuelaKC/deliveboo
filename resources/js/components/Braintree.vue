<template>
  <div>
    <div id="dropin-container"></div>

    <button
      v-if="viewDropIn"
      type="submit"
      class="btn btn-bluegreen"
      id="submitTransaction"
      @click="dropinRequestPaymentMethod"
    >
      Paga
    </button>
    <button v-else class="btn btn-bluegreen opacity">Paga</button>
  </div>
</template>

<script>
export default {
  name: "Braintree",

  created() {
    axios.get("/api/payment/generate").then((response) => {
      this.authorization = response.data.token;
      this.dropinCreate();
    });

    // this.$parent.$on("tokenize", () => {
    //   this.dropinRequestPaymentMethod();
    // });
  },

  data() {
    return {
      errorMessage: "",
      dropinInstance: "",
      paymentPayload: "",
      authorization: "",
      viewDropIn: false,
    };
  },

  props: {
    newOrderId: Number,
  },

  methods: {
    dropinCreate() {
      const dropin = require("braintree-web-drop-in");

      const dropinOptions = {
        authorization: this.authorization,
        container: "#dropin-container",
        locale: "it_IT",
        card: {
          overrides: {
            fields: {
              cvv: {
                maskInput: true,
              },
            },
          },
        },
      };

      dropin.create(dropinOptions, (dropinError, dropinInstance) => {
        if (dropinError) {
          this.errorMessage =
            "There was an error setting up the client instance. Message: " +
            dropinError.message;
          this.$emit("bt.error", this.errorMessage);
          return;
        }
        this.dropinInstance = dropinInstance;
        this.viewDropIn = true;
      });
    },

    dropinRequestPaymentMethod() {
      this.dropinInstance.requestPaymentMethod((requestError, payload) => {

        if (requestError) {
          this.errorMessage =
            "There was an error setting up the client instance. Message: " +
            requestError.message;
          this.$emit("bt.error", this.errorMessage);
          return;
        }
this.viewDropIn = false;
        console.log('payload', payload.nonce);
        let paymentData = this.getPaymentData(payload.nonce);
        console.log('payment', paymentData);
        axios.post('/api/payment/make_payment', paymentData).then((response) => {
          let message = response.data.message
          this.$emit('successPayment', message);
          localStorage.clear();
        })
        this.paymentPayload = payload;
      });
    },

    getPaymentData(token) {
      return {
        token: token,
        order: this.newOrderId,
      }
    }
  },
};
</script>