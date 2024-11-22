<template>
    <div class="w-1/2 border-2 border-black m-auto p-4">
        <h3>Add a task</h3>

        <form @submit.prevent>
            <label for="project">Choose a project:</label>
            <select name="project" id="project" v-model="selectedProject">
                <option v-for="project in projects" :key="project.id" :value="project.id">
                    {{ project.name }}
                </option>
            </select>

            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                v-model="name"
                name="name"
            >

            <label for="datetime">Choose a date and time:</label>
            <input type="datetime-local" id="datetime" name="datetime">

            <button type="button" @click="storeTask">Save task</button>
        </form>

        <div class="flex justify-between">
            <router-link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" to="/projects">
                Go to Projects Page
            </router-link>
            <router-link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" to="/reports">
                Go to Reports Page
            </router-link>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'tasks',
    data() {
        return {
            name,
            projects: [],
            selectedProject: ''
        };
    },
    mounted() {
        this.fetchProjects();
    },
    methods: {
        fetchProjects() {
            axios.get('/projects')
                .then(response => {
                    this.projects = response.data.data;
                })
                .catch(error => {
                    console.error("There was an error fetching the projects data:", error);
                });
        },
        storeTask() {
            // TODO: Add storing logic
        }
    }
}
</script>
