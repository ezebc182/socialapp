<template>
    <div v-if="statuses.length > 0">
        <div class="card border-0 mb-3 shadow-sm" v-for="status in statuses">
            <div class="card-body d-flex flex-column" :key="status.created_at">
                <div class="d-flex align-items-center mb-3">
                    <img width="40px" class="rounded mr-3 shadow-sm"
                         src="https://aprendible.com/images/default-avatar.jpg" alt="Avatar">
                    <div>
                        <h5 class="mb-1" v-text="status.user_name"></h5>

                        <div class="small text-muted" v-text="status.ago"></div>
                    </div>
                </div>
                <p class="card-text text-secondary" v-text="status.body"></p>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data () {
      return {
        statuses: []
      }
    },
    mounted () {
      axios.get('/statuses')
        .then(response => {
          this.statuses = response.data.data
        })
        .catch(err => console.error(err.response.data))
      EventBus.$on('status-created', status => {
        this.statuses.unshift(status)
      })
    }
  }
</script>

<style scoped>

</style>