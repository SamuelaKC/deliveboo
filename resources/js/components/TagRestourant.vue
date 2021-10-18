<template>
<div class="row">
  <div
      v-for="user in restaurantOfTag.user"
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
import Loading from './Loading.vue';
export default {
  name: "TagRestourant",
  props: {
    restaurantOfTag:Object, 
  },
  data() {
    return {
        
    };
  },
};
</script>