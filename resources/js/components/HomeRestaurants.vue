<template>
    
       <div class="row justify-content-center">

           <div v-for="users in user" :key="user.id" class="card-group col-md-4">
            <div class="card">
                <div v-for="tag in users.tag" :key="tag.id" class="card-body">
                    <div class="card-text">{{tag.name}}</div>
                </div>
            </div> 
           <div class="card">
                
                <img class="card-img-top" :src="users.picture" alt="Card image cap">
                
                <div class="card-body">
                    <h5 class="card-title">{{users.name}}</h5>
                    <p class="card-text">{{users.description}}</p>
                </div>
               
            </div> 
             
        </div> 
        
       </div>
    
</template>

<script>
    export default {
        name:'HomeRestaurants',
        data() {
            return {
                user: [],
            }
        },
        created() {
            axios.get('/api/users').then((response)=>{
                this.user = response.data.data;
                console.log(this.user);
            });
        }
    }
</script>