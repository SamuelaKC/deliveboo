<template>
    <div class="container">
        deliveboo
        {{ user.name }}
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: [],
            }
        },
        created() {
            axios.get('/api/users/10').then((response)=>{
                this.user = response.data;
                console.log(response.data);
            });
        }
    }
</script>