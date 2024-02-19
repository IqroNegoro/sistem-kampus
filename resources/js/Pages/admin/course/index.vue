<template>
    <Head title="Courses" />
    <div class="flex flex-col gap-4">
        <div class="flex justify-between">
            <h1 class="text-white font-medium text-3xl">Courses</h1>
            <button class="bg-purple-600 flex justify-center items-center px-2 rounded-lg" @click="showModal = true">
                <i class="bx bx-plus text-white"></i>
            </button>
        </div>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <Header />
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Code</th>
                            <th class="px-4 py-3">SKS</th>
                            <th class="px-4 py-3">Semester</th>
                            <th class="px-4 py-3">Study</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <Rows v-for="course in courses.data" :key="course.id" :course="course" @edit-course="id => editCourse = courses.data.find(v => v.id === id)" />
                    </tbody>
                </table>
            </div>
            <Paginator :links="courses" />
        </div>
    </div>
    <Add v-if="showModal" @close-modal-add="showModal = false" />
    <Edit v-if="editCourse" @close-modal-edit="editCourse = null" :course="editCourse" />
</template>
<script setup>
import Rows from "@/components/admin/course/Rows.vue";
import Add from "@/components/admin/course/Add.vue";
import Edit from "@/components/admin/course/Edit.vue";
import Paginator from "@/components/Paginator.vue";
import Header from "@/components/Header.vue";
import { ref } from "vue";

const props = defineProps(["courses"]);
import { Head } from "@inertiajs/vue3";

const editCourse = ref(null);

const showModal = ref(false);
</script>