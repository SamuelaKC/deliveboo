<template>
  <div class="restaurant">
    <div>{{  }}</div>
  </div>
</template>

<script>

export default {
    name: Restaurant,

  created() {
      axios.get()
  },

  data() {
    return {
        restaurant: [],
        plates: [],
    };
  },
};
</script>