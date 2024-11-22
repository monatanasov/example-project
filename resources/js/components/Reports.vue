<template>
    <div class="w-1/4">
        <h3>Report Page</h3>
    </div>

    <router-link class="text-blue-700 flex" to="/projects">
        Go to Projects Page
    </router-link>
    <router-link class="text-blue-700 flex" to="/tasks">
        Go to Tasks Page
    </router-link>
</template>

<script>
export default {
    name: 'reports',
    data() {
        return {};
    },
}
</script>
