<template>
    <div class="container-fluid container-navbar">

        <div class="container row bg-navbar align-items-center">
            
            <div class="col-4" @click="$emit('viewHomeRestaurant')">
                <img style="width: 200px" src="/image/logo/deliveboo.svg" alt="" />
            </div>

            <div class="input-group col-8">
                <input 
                    style="padding: 20px"
                    type="search"
                    class="form-control rounded"
                    placeholder="Cerca qui i tuoi ristoranti preferiti 🍕 🍔 🍣 "
                    aria-label="Search"
                    aria-describedby="search-addon"
                    v-model="searchRestaurant"
                    @keyup.enter="getSearch()"
                />
                <span style="padding-left: 20px;">
                    <button type="button" class="btn btn-bluegreen">CERCA</button>
                </span>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "Header",
    data(){
        return {
            searchRestaurant: ''
        }
    },
    methods:{
        getSearch(){
            
        }
    } 
};
</script>
