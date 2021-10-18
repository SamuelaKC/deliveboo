<template>
  <div class="row justify-content-center">
    <div
      v-for="user in users"
      :key="user.id"
      class="card-group col-md-4"
      @click="$emit('viewRestaurant', user.id)"
    >
      <!-- <div class="card">
        <div v-for="tag in user.tag" :key="tag.id" class="card-body">
          <div class="card-text">{{ tag.name }}</div>
        </div>
      </div> -->
      <div class="card">
        <img class="card-img-top" :src="user.picture" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">{{ user.name }}</h5>
          <p class="card-text">{{ user.description }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HomeRestaurants',
  data() {
    return {
      users: [],
    }
  },
  created() {
    axios.get('/api/users').then((response) => {
      this.users = response.data.data
      console.log(this.users)
    })
  },
}
</script>
