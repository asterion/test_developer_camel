var app = new Vue({
  el: '#app',
  data() {
    return {
      users: [],
      message: 'Hola'
    }
  },
  mounted() {
    axios
      .get('/api/users')
      .then(response => (this.users = response.data['hydra:member']))
  }
})
