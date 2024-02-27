<template>
    <Head title="Permissions" />
    <div class="flex flex-col gap-4">
        <div class="flex justify-between">
            <h1 class="text-white font-medium text-3xl">Permissions</h1>
        </div>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <Header />
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <Rows v-for="permission in permissions.data" :key="permission.id" :permission="permission" @edit-permission="id => editPermission = permissions.data.find(v => v.id === id)" @info-permission="id => infoPermission = id" />
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <Edit v-if="editPermission" @close-modal-edit="editPermission = null" :room="editPermission" />
</template>
<script setup>
import Rows from "@/components/admin/role/Rows.vue";
import Edit from "@/components/admin/role/Edit.vue";
import { ref } from "vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps(["roles"]);

const editPermission = ref(null);
const infoPermission = ref(null);

const showModal = ref(false);
</script>