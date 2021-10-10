<template>
  <div>
      <div class="container">
        
        <!-- <div v-for="(ordine, index) in orders" :key="index">
          {{ ordine.address }}
        </div> -->
        <h1>Creazione dell'ordine</h1>
        <form @submit.prevent="sendOrder">
          <!-- dettagli -->
          <div class="form-group">
              <label for="details">Dettagli ordine</label>
              <input type="text" 
              class="form-control" 
              name="details" 
              id="details"
              v-model="fields.details" />
          </div>
          <!-- nome e cognome -->
          <div class="form-group">
              <label for="name_surname">Nome e cognome</label>
              <input type="text"  
              class="form-control" 
              name="name_surname" 
              id="name_surname"
              v-model="fields.name_surname" />
          </div>
          <!-- address(via di casa) -->
          <div class="form-group">
              <label for="address">Via</label>
              <input type="text" 
              class="form-control" 
              name="address" 
              id="address"
              v-model="fields.address" />
          </div>
          <!-- numero del telefono -->
          <div class="form-group">
              <label for="phone_number">Numero del telefono</label>
              <input type="text" 
              class="form-control" 
              name="phone_number" 
              id="phone_number"
              v-model="fields.phone_number" />
          </div>
          <!-- prezzo totale -->
          <div class="form-group">
              <label for="total_price">Prezzo totale</label>
              <input type="text" 
              class="form-control" 
              name="total_price" 
              id="total_price"
              v-model="fields.total_price" />
          </div>

          <button type="submit" class="btn btn-primary">Send message</button>

        </form>
      </div>

  </div>
</template>
<script>
    export default {
        name: 'CreateOrder',
        data() {
            return {
                fields:{}, 
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