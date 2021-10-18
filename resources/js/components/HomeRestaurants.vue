<template>
<div class="container">
   <div class="row row-cols-1 row-cols-md-2 g-4 mt-3">
  <div class="col">
    <div class="card">
      <img
        src="https://www.insidemarketing.it/wp-content/uploads/2016/09/foodporn-tutto-quello-che-c%C3%A8-da-sapere-sulle-foto-di-cibo-620x346.jpg"
        class="card-img-top"
        alt="..."
      />
      <div class="card-body">
        <h5 class="card-title">Comfort Food</h5>
        <p class="card-text">
         i grandi classici che riscaldano il cuore
        </p>
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
};
</script>