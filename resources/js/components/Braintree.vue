<template>
  <div>
    <div id="dropin-container"></div>

    <button
      type="submit"
      class="btn btn-bluegreen"
      id="submitTransaction"
      @click="dropinRequestPaymentMethod"
    >
      Drop-in Test
    </button>
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
    };
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

        let token = payload.nonce;

        let data = {
          token: token,
          plates: 2,
        };

        axios.post('/api/payment/make_payment', data).then((response) => {
          let message = response.message
          alert(message)
        })
        console.log(payload.nonce);
        this.paymentPayload = payload;
      });
    },
  },
};
</script>