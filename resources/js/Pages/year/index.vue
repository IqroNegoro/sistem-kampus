<template>
    <div class="flex flex-col gap-4">
        <div class="flex justify-between">
            <h1 class="text-white font-medium text-3xl">Academic Years</h1>
            <button class="bg-purple-600 flex justify-center items-center px-2 rounded-lg" @click="showModal = true">
                <i class="bx bx-plus text-white"></i>
            </button>
        </div>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <Header />
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Year</th>
                            <th class="px-4 py-3">Semester</th>
                            <th class="px-4 py-3 flex items-center gap-2">Status</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <Rows v-for="year in years.data" :key="year.id" :year="year" @edit-year="id => editYear = years.data.find(v => v.id === id)" />
                    </tbody>
                </table>
            </div>
            <Paginator :links="years" />
        </div>
    </div>
    <Add v-if="showModal" @close-modal-add="showModal = false" />
    <Edit v-if="editYear" @close-modal-edit="editYear = null" :year="editYear" />
</template>
<script setup>
import Rows from "../../components/year/Rows.vue";
import Add from "../../components/year/Add.vue";
import Edit from "../../components/year/Edit.vue";
import Paginator from "../../components/Paginator.vue";
import Header from "../../components/Header.vue";
import { router } from "@inertiajs/vue3";
import { ref, computed } from "vue";

const props = defineProps(["years"]);

const editYear = ref(null);

const showModal = ref(false);
</script>