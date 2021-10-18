<template>
<div class="container">
  <div class="row">
    <div v-for="tag in tags" :key="tag.id" class="col-2 mt-3">
      <div @click="restaurantTag" class="card">
        <img
          :src="tag.picture"
          class="card-img-top"
          :alt="tag.name"
        />
        <div class="card-body">
          <h5 class="card-title">{{ tag.name }}</h5>
        </div>
      </div>

    </div> 
  </div>

  <div class="row justify-content-center home-row">
    <Loading v-if="!allRestaurant"/>
    <div
      v-else
      v-for="user in users"
      :key="user.id"
      class="col-6 col-md-4 col-lg-3 mb-4"
      @click="$emit('viewRestaurant', user.id)"
    >
      <div class="deliveboo-card">
        <div class="deliveboo-card-img">
          <img
            :src="user.picture"
            :alt="`Immagine profilo ${user.name}`"
          />
        </div>
        <div class="deliveboo-card-body">
          <h5 class="deliveboo-card-title">{{ user.name }}</h5>
          <p class="deliveboo-card-text">{{ user.description }}</p>
        </div>
        <div class="deliveboo-tag">
          <span v-for="tag in user.tag" :key="tag.id" class="deliveboo-tag-text">
           #{{ tag.name.toLowerCase() }}
          </span>
        </div>
      </div>
    </div>
  </div>
 
</div>

</template>

<script>
import Loading from './Loading.vue';
export default {
  components: { Loading },
  name: "HomeRestaurants",
  data() {
    return {
      users: [],
      allRestaurant: false,
      tags: [],
    };
  },
  created() {
    axios.get("/api/users").then((response) => {
      this.users = response.data.data;
      this.allRestaurant = true;
    });
    // Chiamata axios per i tag:
    axios.get("/api/tag").then((response) => {
      this.tags = response.data.data;
      console.log(this.tags);
    });
  },
  methods: {
    restaurantTag() {
      alert('ciao');
    }
  },
};
</script>