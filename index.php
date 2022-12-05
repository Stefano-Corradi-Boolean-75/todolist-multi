<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TODO list</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- VueJs -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>

<body>

    <div class="wrapper">
        <div id="app">
            <section class="todo-list py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="display-1 text-muted">Todo List</h1>

                            <div v-if="errorMsg.length > 0" class="alert alert-danger" role="alert">
                                {{errorMsg}}
                            </div>


                            <ul class="list-group list-group-flush border border-1 rounded">

                                <li
                                v-for="(todo, index) in todos" :key="index"
                                @click="toggleDone(index)"
                                class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="w-100 h-100 task-item "
                                    :class="{'text-decoration-line-through': todo.done}"
                                    >{{todo.text}}</span>
                                    <span @click.stop="deleteTodo(index)" class="trash badge bg-danger p-2 ">
                                        <i class="fa-solid fa-trash"></i>
                                    </span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="add-todo">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input @keyup.enter="addTodo()" v-model.trim="todoStr" type="text" class="form-control" placeholder="Inserisci elemento..." aria-label="Inserisci nuovo elemento per la lista" aria-describedby="button-add">
                                <button @click="addTodo()" class="btn btn-outline-warning" type="button" id="button-add">Inserisci</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</body>

<script src="./js/main.js"></script>

</html>