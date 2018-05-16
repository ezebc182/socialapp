<template>
    <form @submit.prevent="submit">
        <div class="card-body">
            <textarea class="form-control border-0 bg-light"
                      placeholder="¿Qué estás pensando?"
                      name="body"></textarea>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" id="create-status">Publicar</button>
        </div>
    </form>
</template>

<script>
    export default {
        methods: {
            submit() {
                console.log('Sending...')
            }
        }
    }
</script>

<style scoped>

</style>