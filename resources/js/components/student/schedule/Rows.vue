<template>
    <tr class="text-gray-700 dark:text-gray-400">
        <td class="px-4 py-3">
            {{ schedule.course?.name }}
        </td>
        <td class="px-4 py-3 text-sm">
            {{ schedule.course.code }}
        </td>
        <td class="px-4 py-3 text-sm">
            {{ schedule.room?.building?.name }}
        </td>
        <td class="px-4 py-3 text-sm">
            {{ schedule.room?.room }}
        </td>
        <td class="px-4 py-3 text-sm">
            {{ schedule.day }}
        </td>
        <td class="px-4 py-3 text-sm">
            {{ schedule.time }}
        </td>
        <td class="px-4 py-3 text-sm">
            {{ schedule.lecturer?.name }}
        </td>
    </tr>
</template>
<script setup>
defineProps(["schedule"]);
</script>