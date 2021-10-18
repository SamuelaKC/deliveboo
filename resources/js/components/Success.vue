<template>
    <div>
        <div>

        {{messageSuccess}}
        </div>

        <button class="btn btn-bluegreen" @click="goToHome">Torna alla Home</button>
    </div>
</template>

<script>

export default {
    name: 'Success',
    props: {
        messageSuccess: String,
    },
    methods: {
        goToHome() {
            localStorage.clear();
            window.location.reload();
        }
    }

}
</script>
