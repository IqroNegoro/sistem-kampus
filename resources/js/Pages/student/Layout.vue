<template>
    <div class="flex h-screen overflow-hidden bg-gray-50 dark:bg-gray-900">
        <Sidebar :class="{'max-md:hidden': !showNavbar}" />
        <div class="w-full flex flex-col">
            <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
                <div class="container flex items-center justify-between h-8 px-6 mx-auto text-purple-600 dark:text-purple-300">
                    <button class="md:hidden" @click="showNavbar = !showNavbar">
                        <i class="bx bx-menu text-3xl"></i>
                    </button>
                </div>
            </header>
            <div class="p-4 overflow-y-auto">
                <slot />
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import Sidebar from "@/components/student/Sidebar.vue";
const showNavbar = ref(false);
</script>