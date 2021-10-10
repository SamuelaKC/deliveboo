<template>
  <div class="restaurant">
    <div></div>
  </div>
</template>

<script>

export default {
    name: Restaurant,

  created() {
      axios.get('/api/users/11').then((response) => {
        this.restaurant = response.data;
      })
  },

  data() {
    return {
        restaurant: [],
    };
  },
};
</script>