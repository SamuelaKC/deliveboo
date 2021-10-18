<template>
    <div>
        <div>

        {{messageSuccess}}
        </div>

        <button class="btn btn-bluegreen">Torna alla Home</button>
    </div>
</template>

<script>

export default {
    name: 'Success',
    props: {
        messageSuccess: String,
    }

}
</script>
