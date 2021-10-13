<template>
    <div class="col-lg-4">
                <div class="form-content carrello">
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
                    <hr class="separetor">
                    <!-- subtotale -->
                    <div class="box-carrello subtotale">
                        <h6>Subtotale</h6>
                        <div class="number">12,49 €</div>
                    </div>
                    <!-- spese-consegna -->
                    <div class="box-carrello spese-consegna">
                        <h6>Spese di consegna</h6>
                        <!-- Magari queste le facciamo standard -->
                        <div class="number">1,99 €</div>
                    </div>
                    <!-- spese-servizio -->
                    <div class="box-carrello spese-servizio">
                        <h6>Spese di servizio</h6>
                        <!-- Magari queste le facciamo standard -->
                        <div class="number">0,20 €</div>
                    </div>
                    <hr class="separetor">
                    <div class="box-carrello totale">
                        <h6>Totale</h6>
                        <div class="final-price">14,68 €</div>
                    </div>

                </div> 
            </div>
</template>

<script>

    export default {
        name:'Cart',
    }
</script>