<template>
  
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="form-content">
                    <h1>Dettagli dell'ordine</h1>
                    <form @submit.prevent="sendOrder">
                    <!-- nome e cognome -->
                    <div class="form-group">
                        <label for="name_surname">Nome e cognome</label>
                        <input type="text" 
                        placeholder="es. Gino Rossi" 
                        class="form-control" 
                        name="name_surname" 
                        id="name_surname"
                        v-model="fields.name_surname" />
                    </div>
                    <!-- address(via di casa) -->
                    <div class="form-group">
                        <label for="address">Via</label>
                        <input type="text"
                        placeholder="es. Via Ettore Ponti, 21" 
                        class="form-control" 
                        name="address" 
                        id="address"
                        v-model="fields.address" />
                    </div>
                    <!-- numero del telefono -->
                    <div class="form-group">
                        <label for="phone_number">Numero del telefono</label>
                        <input type="text" 
                        placeholder="+39 0230578330"
                        class="form-control" 
                        name="phone_number" 
                        id="phone_number"
                        v-model="fields.phone_number" />
                    </div>
                    <!-- dettagli -->
                    <div class="form-group">
                        <label for="details">Istruzioni per il rider</label>
                        <input type="text"
                        placeholder="es. È la porta nera vicino al negozio di animali. Per favore chiama quando arrivi."
                        class="form-control" 
                        name="details" 
                        id="details"
                        v-model="fields.details" />
                    </div>
                    <!-- prezzo totale -->
                    <div class="form-group">
                        <div class="prezzo-totale">
                            prezzo totale: {{ totalPrice }} €
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Send message</button>

                    </form>
                    
                    <h2>Metodo di pagamento</h2>
                </div>     
            </div>
            <!-- 2 -->
            <div class="col-lg-4">
                <div class="form-content">
                    <h4>Carrello</h4>
                    <!-- 1 -->
                    <div class="items">
                        <div class="quantity">1x</div>
                        <div class="name-plate">
                            El Burrito de Philadelphia <br>
                            descrizione...
                        </div>
                        <div class="price">12,49 €</div>    
                    </div>
                    <hr class="separator">
                    <!-- 2 -->
                    <div class="subtotale">
                        <h5>Subtotale</h5>
                        <div class="number">12,49</div>
                    </div>
                    <!-- 3 -->
                    <div class="spese-consegna">
                        <h5>Spese di consegna</h5>
                        <!-- Magari queste le facciamo standard -->
                        <div class="number">1,99 €</div>
                    </div>
                    <!-- 4 -->
                    
                </div> 
            </div>


        </div>

    </div>

  
</template>
<script>
    export default {
        name: 'CreateOrder',
        data() {
            return {
                fields:{},
                totalPrice: 10.00,
            }
        },
        created() {
            this.price();
        },
        methods: {
            // Ora mi serve la chiamata axios per salvare i dati nello store
            sendOrder() {
                axios.post('api/orders', this.fields).then((response)=>{
                    alert('ho salvato tutto');
                });
            },
            // Per il prezzo fisso da rendere dinamico tramite il carello
            price() {
                this.fields.total_price = this.totalPrice; 
            }

        }
        
    }
</script>