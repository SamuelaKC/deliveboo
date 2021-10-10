<template>
    <div class="container">
        <Plates />
    </div>
</template>

<script>
import Plates from './Plates.vue';
    export default {
        components : {
            Plates
        },
        data() {
            return {
                plate: [],
            }
        },
        created() {
            axios.get().then((response)=>{
                this.plate = response.data;
                console.log(response.data);
            });
        },
    }
</script>