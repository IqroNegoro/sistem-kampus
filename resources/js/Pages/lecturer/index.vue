<template>
    <Head title="Lecturers" />
    <div class="flex flex-col gap-4">
        <div class="flex justify-between">
            <h1 class="text-white font-medium text-3xl">Lecturers</h1>
            <button class="bg-purple-600 flex justify-center items-center px-2 rounded-lg" @click="showModal = true">
                <i class="bx bx-plus text-white"></i>
            </button>
        </div>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <Header />
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">NIDN</th>
                            <th class="px-4 py-3">Faculty</th>
                            <th class="px-4 py-3">Gender</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <Rows v-for="lecturer in lecturers.data" :key="lecturer.id" :lecturer="lecturer" @edit-lecturer="id => editLecturer = lecturers.data.find(v => v.id === id)" @info-lecturer="id => infoLecturer = lecturers.data.find(v => v.id === id)" />
                    </tbody>
                </table>
            </div>
            <Paginator :links="lecturers" />
        </div>
    </div>
    <Add v-if="showModal" @close-modal-add="showModal = false" />
    <Edit v-if="editLecturer" @close-modal-edit="editLecturer = null" :lecturer="editLecturer" />
    <Info v-if="infoLecturer" @close-modal-info="infoLecturer = null" :lecturer="infoLecturer" />
</template>
<script setup>
import Rows from "../../components/lecturer/Rows.vue";
import Add from "../../components/lecturer/Add.vue";
import Edit from "../../components/lecturer/Edit.vue";
import Info from "../../components/lecturer/Info.vue";
import Paginator from "../../components/Paginator.vue";
import Header from "../../components/Header.vue";
import { ref } from "vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps(["lecturers"]);

const editLecturer = ref(null);
const infoLecturer = ref(null);
const showModal = ref(false);
</script>