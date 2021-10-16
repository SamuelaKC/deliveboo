<template>
  <div class="row justify-content-center home-row">
    <div
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
</template>

<script>
export default {
  name: "HomeRestaurants",
  data() {
    return {
      users: [],
    };
  },
  created() {
    axios.get("/api/users").then((response) => {
      this.users = response.data.data;
      console.log(this.users);
    });
  },
};
</script>