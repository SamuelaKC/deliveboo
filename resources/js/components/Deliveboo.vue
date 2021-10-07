<template>
  <div class="container">
    <FormUser />
  </div>
</template>

<script>
import FormUser from "./FormUser.vue";

export default {
  components: {
    FormUser,
  },

  created() {
    axios.get("/api/users/10").then((response) => {
      this.user = response.data;
      console.log(response.data);
    });
  },

  data() {
    return {
      user: [],
    };
  },
};
</script>