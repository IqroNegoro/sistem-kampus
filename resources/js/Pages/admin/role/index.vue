<template>
    <Head title="Roles" />
    <div class="flex flex-col gap-4">
        <div class="flex justify-between">
            <h1 class="text-white font-medium text-3xl">Roles</h1>
            <button class="bg-purple-600 flex justify-center items-center px-2 rounded-lg" @click="showModal = true">
                <i class="bx bx-plus text-white"></i>
            </button>
        </div>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <Header />
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Name</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <Rows v-for="role in roles.data" :key="role.id" :role="role" @edit-role="id => editRole = roles.data.find(v => v.id === id)" @info-role="id => infoRole = id" />
                    </tbody>
                </table>
            </div>
            <Paginator :links="roles" />
        </div>
    </div>
    <Add v-if="showModal" @close-modal-add="showModal = false" />
    <Edit v-if="editRole" @close-modal-edit="editRole = null" :room="editRole" />
</template>
<script setup>
import Rows from "@/components/admin/room/Rows.vue";
import Edit from "@/components/admin/room/Edit.vue";
import Paginator from "@/components/Paginator.vue";
import Header from "@/components/Header.vue";
import { ref } from "vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps(["roles"]);

const editRole = ref(null);
const infoRole = ref(null);

const showModal = ref(false);
</script>