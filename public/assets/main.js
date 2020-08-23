var app = new Vue({
  el: '#app',
  data() {
    return {
      users: []
    }
  },
  mounted(){
    this.users = [{name: 'jhon'}];
    axios.get('/api/users').then(response => {
      this.users = response.data;
    });
  },
  methods: {
    addUser: function(event) {
      this.users.push({
        name: '',
        role: 'user',
        last_access: ''
      });
    },
    saveUser: function(user){
      console.log(user);
      axios.put('/api/users', user).then(response => {
        console.log(response.data);;
      });
    }
  }
})
