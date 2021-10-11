<template>
    <div class="container-fluid">
       <div class="row justify-content-center">
        <div v-for="plates in plate" :key="plate.id" class="card-group col-1 col-md-3">
           <div style="border-radius: 25px" class="card">
                <img  style="border-radius: 25px" class="card-img-top" :src="plates.picture" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title">{{plates.name}}</h3>
                    <p class="card-text">{{plates.description}}</p>
                    <p class="card-text">{{plates.price}} €</p>
                </div>
            </div>  
        </div> 
       </div>
    </div>
    
</template>


<script>
    export default {
        name: 'Plates',
        data() {
            return {
                  plate: [],
            }
        },
        created() {
            axios.get('/api/plates').then((response)=>{
                this.plate = response.data;
                console.log(response.data);
            });
        }
    }
</script>

