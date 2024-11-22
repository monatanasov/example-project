<template>
    <div class="w-1/2 border-2 border-black m-auto p-4">
        <h3>Add a project</h3>
        <form @submit.prevent>
                <label for="name">Project name:</label>
                <input
                    type="text"
                    id="name"
                    v-model="name"
                    name="name"
                >

                <button
                    type="button"
                    @click="storeProject"
                    disabled
                    title="This feature is under development"
                >
                    Save project
                </button>
        </form>
        <div class="flex justify-between">
            <router-link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" to="/tasks">
                Go to Tasks Page
            </router-link>
            <router-link class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" to="/reports">
                Go to Reports Page
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'projects',
    data() {
        return {
            name: '',
        };
    },
    methods: {
        storeProject() {
            // TODO: Add storing logic
        }
    }
}
</script>
