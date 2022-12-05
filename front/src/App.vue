<script>
import TodoList from './components/TodoList.vue'
export default {
    data: function () {
        return {

        };
    },
    components: {
        TodoList,
    }
}
</script>

<template>
    <div class="wrapper">
        <TodoList />
    </div>
</template>

<style lang="scss">
@use './assets/general.scss' as *;
</style>
