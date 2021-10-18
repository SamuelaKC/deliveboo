<template>
  <div class="loading">
    <div>
      <i class="fa fa-spinner"></i>
      Loading...
    </div>
  </div>
</template>

<script>

export default {
  name: 'Loading',
};
</script>

<style scoped>
.loading {
  font-size: 40px;
  color: #12ccbc;
  display: flex;
  justify-content: center;
  align-items: center;
}

i.fa.fa-spinner {
  font-size: 50px;
  animation: round 2s linear infinite;
}

@keyframes round {
  100% {
    transform: rotate(360deg);
  }
}
</style>