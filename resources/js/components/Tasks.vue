<template>
    <div class="w-1/4">
        <h3>Hello from Tasks</h3>
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
export default {
    name: 'tasks',
    data() {
        return {};
    },
}
</script>
