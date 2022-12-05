<script>
import axios from 'axios';
export default {
    name: "TodoList",
    data: function () {
        return {
            msg: 'Hello World',
            apiUrl: 'http://localhost:8888/review/php/old/408-ex-php-todo-list-multi/server.php',
            todoList: [],
        };
    },
    methods: {
        readList() {

            axios.get(this.apiUrl).then((response) => {
                console.log(response.data);
                this.todoList = response.data;
            });

        },
    },
    mounted() {
        this.readList();
    }
}
</script>

<template>
    <section class="todo-list py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-1 text-muted">Todo List</h1>
                    <ul class="list-group list-group-flush border border-1 rounded">
                        <li v-for="(task, index) in todoList" :key="index"
                            class="list-group-item d-flex justify-content-between align-items-center">

                            <span class="w-100 h-100 task-item">{{ task.text }}</span>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

</template>