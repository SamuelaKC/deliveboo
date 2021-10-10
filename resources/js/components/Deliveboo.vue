<template>
  <div class="container">
    <FormUser />
    <Restaurant />
  </div>
</template>

<script>
import FormUser from "./FormUser.vue";
import Restaurant from "./Restaurant.vue";

export default {
  components: {
    FormUser,
    Restaurant
  },

  created() {
  },

  data() {
    return {
    };
  },
};
</script>