<template>
    <tr class="text-gray-700 dark:text-gray-400">
        <td class="px-4 py-3 text-sm">
            {{ permission.name }}
        </td>
        <td class="px-4 py-3">
            <div class="flex items-center space-x-4 text-sm">
                <button @click="$emit('infoOermission', permission.id)"
                    class="bg-blue-500 text-white flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 cursor-pointer rounded-lg focus:outline-none focus:shadow-outline-gray"
                    aria-label="Edit">
                    <i class="bx bx-info-circle"></i>
                </button>
                <button @click="$emit('editPermission', permission.id)"
                    class="bg-yellow-500 text-white flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 cursor-pointer rounded-lg focus:outline-none focus:shadow-outline-gray"
                    aria-label="Edit">
                    <i class="bx bx-edit"></i>
                </button>
            </div>
        </td>
    </tr>
</template>
<script setup>
defineProps(["permission"]);
defineEmits(["editPermission", "infoPermission"]);
</script>