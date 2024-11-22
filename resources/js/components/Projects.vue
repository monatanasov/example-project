<template>
    <div class="w-1/4">
        <h3>Add a project</h3>
        <form @submit.prevent>
                <label for="project_name">Project name:</label>
                <input
                    type="text"
                    id="project_name"
                    v-model="name"
                    name="project_name"
                >

                <button type="button">Save project</button>
        </form>
    </div>

    <router-link class="text-blue-700 flex" to="/tasks">
        Go to Tasks Page
    </router-link>
    <router-link class="text-blue-700 flex" to="/reports">
        Go to Reports Page
    </router-link>
</template>

<script>
export default {
    name: 'projects',
    data() {
        return {
            name: '',
        };
    },
}
</script>
