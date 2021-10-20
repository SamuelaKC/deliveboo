<template>
  <div class="container">
    <Loading v-if="!allRestaurant" />

    <div v-else class="row justify-content-center home-row">
      <div
        v-for="(tag, index) in tags"
        :key="`${index} ${tag.id}`"
        class="col-6 col-md-4 col-lg-2 mt-3 mb-3"
      >
        <div @click="$emit('restaurantTag', tag.id)" class="deliveboo-card">
          <div class="deliveboo-card-img deliveboo-card-img-tag">
            <img :src="tag.picture" class="card-img-top" :alt="tag.name" />
          </div>
          <div class="deliveboo-card-body">
            <h5 class="deliveboo-card-title">{{ tag.name }}</h5>
          </div>
        </div>
      </div>
      <div
        v-for="user in users"
        :key="user.id"
        class="col-6 col-md-4 col-lg-3 mb-4"
        @click="$emit('viewRestaurant', user.id)"
      >
        <div class="deliveboo-card">
          <div class="deliveboo-card-img deliveboo-card-img-restaurant">
            <img :src="user.picture" :alt="`Immagine profilo ${user.name}`" />
          </div>
          <div class="deliveboo-card-body">
            <h5 class="deliveboo-card-title">{{ user.name }}</h5>
            <p class="deliveboo-card-text">{{ user.description }}</p>
          </div>
          <div class="deliveboo-tag">
            <span
              v-for="tag in user.tag"
              :key="tag.id"
              class="deliveboo-tag-text"
            >
              #{{ tag.name.toLowerCase() }}
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Loading from "./Loading.vue";
export default {
  components: {
    Loading,
  },
  name: "HomeRestaurants",
  data() {
    return {
      tags: [],
      restaurantOfTag: [],
      flagTag: false,
    };
  },
  props: {
    users: Array,
    allRestaurant: Boolean,
  },
  created() {
    // Chiamata axios per i tag:
    axios.get("/api/tag").then((response) => {
      this.tags = response.data.data;
      console.log(this.tags);
    });
  },
  methods: {},
};
</script>
