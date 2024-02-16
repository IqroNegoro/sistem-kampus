<template>
    <tr class="text-gray-700 dark:text-gray-400">
        <td class="px-4 py-3">
            <div class="flex items-center text-sm">
                <div class="relative hidden w-16 h-16 mr-3 rounded-full md:block">
                    <img class="object-cover aspect-square object-center w-full h-full rounded-full" :src="student.photo"
                        :alt="student.name" loading="lazy" />
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                    <p class="font-semibold"> {{ student.name }} </p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">

                    </p>
                </div>
            </div>
        </td>
        <td class="px-4 py-3 text-sm">
            {{ student.nim }}
        </td>
        <td class="px-4 py-3 text-xs">
            {{ student.study?.name ?? "" }}
        </td>
        <td class="px-4 py-3 text-sm">
            {{ student.gender }}
        </td>
        <td class="px-4 py-3">
            <div class="flex items-center space-x-4 text-sm">
                <button @click="$emit('editStudent', student.id)"
                    class="bg-yellow-500 text-white flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 cursor-pointer rounded-lg focus:outline-none focus:shadow-outline-gray"
                    aria-label="Edit">
                    <i class="bx bx-edit"></i>
                </button>
                <button @click="router.delete(`/students/${student.id}`)"
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
defineProps(["student"]);
defineEmits(["editStudent"]);
</script>