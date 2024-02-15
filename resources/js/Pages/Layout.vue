<template>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900">
        <Sidebar />
        <div class="w-full p-8 overflow-y-auto">
            <slot />
        </div>
    </div>
</template>

<script setup>
import Sidebar from "../components/Sidebar.vue";
</script>