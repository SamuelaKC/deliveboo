<template>
  <div>
      <div class="container">
          Ciao sono io 
      </div>

  </div>
</template>
<script>
    export default {
        name: 'DetailUserPlate',
        data() {
            return {
                
            }
        },
        created() {
            
        },
        methods: {
            // Ora mi serve la chiamata axios per salvare i dati nello store
            sendOrder() {
                axios.post('api/orders', this.fields).then((response)=>{
                    alert('ho salvato tutto');
                });
            }
        }
        
    }
</script>