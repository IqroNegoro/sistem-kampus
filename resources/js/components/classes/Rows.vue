<template>
    <tr class="text-gray-700 dark:text-gray-400">
        <td class="px-4 py-3 text-sm">
            {{ clas.name }}
        </td>
        <td class="px-4 py-3 text-sm">
            {{ clas.generation }}
        </td>
        <td class="px-4 py-3 text-sm">
            {{ clas.total }}
        </td>
        <td class="px-4 py-3 text-sm">
            {{ clas.study?.name }}
        </td>
        <td class="px-4 py-3 text-sm">
            {{ clas.lecturer?.name }}
        </td>
        <td class="px-4 py-3">
            <div class="flex items-center space-x-4 text-sm">
                <button @click="$emit('editClass', clas.id)"
                    class="bg-yellow-500 text-white flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 cursor-pointer rounded-lg focus:outline-none focus:shadow-outline-gray"
                    aria-label="Edit">
                    <i class="bx bx-edit"></i>
                </button>
                <button @click="router.delete(`/classes/${clas.id}`)"
                    class="bg-red-500 text-white flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 cursor-pointer rounded-lg focus:outline-none focus:shadow-outline-gray"
                    aria-label="Delete">
                    <i class="bx bx-trash"></i>
                </button>
            </div>
        </td>
    </tr>
</template>
<script setup>
import { router } from "@inertiajs/vue3";
defineProps(["clas"]);
defineEmits(["editClass"]);
</script>