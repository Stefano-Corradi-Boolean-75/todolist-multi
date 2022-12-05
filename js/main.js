const { createApp } = Vue;


createApp({

  data(){
    return{
      apiUrl: 'server.php',
      todos: [],
      todoStr:'',
      errorMsg:''
    }
  },
  methods:{
    getTodos(){
      axios.get(this.apiUrl)
      .then(result => {
        this.todos = result.data;
      })
    },
    addTodo(){
      this.errorMsg = '';

      // preparo la chiave->valore da inviare in POST
      const data = {
        todoText: this.todoStr
      }

      axios.post(this.apiUrl, data, {
        // non usando new FormData devo passare questo oggetto alla chiamata
        headers: {'Content-Type': 'multipart/form-data'}
      })
        .then(result => {
          this.todoStr = '';
          this.todos = result.data;
        })

    },
    toggleDone(index){
      this.errorMsg = '';

      // utilizzando FormData questa è la sintassi per passare i parametri
      const data = new FormData();
      data.append('toggleDone',index);

      // con FromData non devo più ahhiungere l'oggetto con headers
      axios.post(this.apiUrl, data)
       .then(result => {
        this.todos = result.data;
       })
    },
    deleteTodo(index){
      this.errorMsg = '';
      if(!this.todos[index].done){
        this.errorMsg = "Prima di eliminare è necessario aver svolto il todo"
      }else{
        if(confirm('confermi l\'eliminazione?')){
          const data = new FormData();
          data.append('deleteTodo',index);
          
          axios.post(this.apiUrl, data)
          .then(result => {
            this.todos = result.data;
          })
        }
      }
      
    }
  },
  mounted(){
    this.getTodos();
  }

}).mount('#app');