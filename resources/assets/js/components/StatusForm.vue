<template>
    <div>
        <form @submit.prevent="submit"
              v-if="isAuthenticated">
            <div class="card-body">
            <textarea
                    class="form-control border-0 bg-light"
                    :placeholder="`¿Qué estás pensando ${user.name}?`"
                      name="body" v-model="body"></textarea>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" id="create-status">Publicar</button>
            </div>
        </form>
        <div v-else class="card-body">
            <a href="/login">You must be logged in</a>
        </div>
    </div>

</template>

<script>
  export default {
    data () {
      return {
        body: ''
      }
    },
    methods: {
      submit () {
        axios.post('/statuses', {
          'body': this.body
        }).then((response) => {
          EventBus.$emit('status-created', response.data.data)
          this.body = ''
        }).catch((err) => {
          console.error(err.response.data)
        })
      }
    }
  }
</script>

<style scoped>

</style>