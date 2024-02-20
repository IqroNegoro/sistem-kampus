<template>
  <Head title="Studies" />
    <div class="flex flex-col gap-4">
        <div class="flex justify-between">
            <h1 class="text-white font-medium text-3xl">Program Study</h1>
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
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Code</th>
                            <th class="px-4 py-3">Degree</th>
                            <th class="px-4 py-3">Faculty</th>
                            <th class="px-4 py-3">Chairman</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <Rows v-for="study in studies.data" :key="study.id" :study="study" @edit-study="id => editStudy = studies.data.find(v => v.id === id)" />
                    </tbody>
                </table>
            </div>
            <Paginator :links="studies" />
        </div>
    </div>
    <Add v-if="showModal" @close-modal-add="showModal = false" />
    <Edit v-if="editStudy" @close-modal-edit="editStudy = null" :study="editStudy" />
</template>
<script setup>
import Rows from "@/components/admin/study/Rows.vue";
import Add from "@/components/admin/study/Add.vue";
import Edit from "@/components/admin/study/Edit.vue";
import Paginator from "@/components/Paginator.vue";
import Header from "@/components/Header.vue";
import { ref } from "vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps(["studies"]);

const editStudy = ref(null);

const showModal = ref(false);
</script>