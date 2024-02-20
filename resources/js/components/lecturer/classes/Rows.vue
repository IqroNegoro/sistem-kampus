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
    </tr>
</template>
<script setup>
defineProps(["clas"]);
</script>