<template>
    <div class="fixed overflow-y-auto inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
        @click.self="$emit('closeModalAdd')">
        <div class="w-full px-6 py-4 h-full md:h-auto overflow-y-auto bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            id="modal">
            <header class="flex justify-end">
                <button @click="$emit('closeModalAdd')"
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <form @submit.prevent="form.post('/classes', {
                onSuccess: () => $emit('closeModalAdd'),
            })" class="mt-4 mb-6 flex flex-col gap-4">
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Add New Class
                </p>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input v-model="form.name" type="text"
                        class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border-red-500 dark:border-red-500': form.errors.name}"
                        placeholder="RPL1A" />
                        <p class="text-red-500 font-medium" v-if="form.errors.name"> {{ form.errors.name }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Generation</span>
                    <input v-model="form.generation" type="number"
                        class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border-red-500 dark:border-red-500': form.errors.generation}"
                        placeholder="1" />
                        <p class="text-red-500 font-medium" v-if="form.errors.generation"> {{ form.errors.generation }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Total</span>
                    <input v-model="form.total" type="number"
                        class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border-red-500 dark:border-red-500': form.errors.total}"
                        placeholder="30" />
                        <p class="text-red-500 font-medium" v-if="form.errors.total"> {{ form.errors.total }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Program Study</span>
                    <select v-model="form.study_id"
                        class="block w-full mt-1 text-sm dark border text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" :class="{'border-red-500 dark:border-red-500': form.errors.study_id}">
                        <option value="">Select</option>
                        <option v-for="study in studies" :key="study.id" :value="study.id"> {{ study.name }}
                        </option>
                    </select>
                    <p class="text-red-500 font-medium" v-if="form.errors.study_id"> {{ form.errors.study_id }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Lecturer</span>
                    <select v-model="form.lecturer_id"
                        class="block w-full mt-1 text-sm dark border text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" :class="{'border-red-500 dark:border-red-500': form.errors.lecturer_id}">
                        <option value="">Select</option>
                        <option v-for="lecturer in lecturers" :key="lecturer.id" :value="lecturer.id"> {{ lecturer.name }}
                        </option>
                    </select>
                    <p class="text-red-500 font-medium" v-if="form.errors.lecturer_id"> {{ form.errors.lecturer_id }} </p>
                </label>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button @click="$emit('closeModalAdd')" type="button"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray" :disabled="form.processing">
                    Cancel
                </button>
                <button
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" :disabled="form.processing">
                    <i v-if="form.processing" class="bx bx-loader-alt bx-spin"></i>
                    <p v-else>Add</p>
                </button>
            </footer>
        </form>
        </div>
    </div>
</template>
<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";
import { useForm } from "@inertiajs/vue3";

defineEmits(["closeModalAdd"]);

const form = useForm({
    name: "",
    generation: "",
    total: "",
    study_id: "",
    lecturer_id: "",
});

const studies = ref([]);
const lecturers = ref([]);

onMounted(async () => {
    [studies.value, lecturers.value] = await Promise.all([
        axios.get("/api/studies").then(res => res.data),
        axios.get("/api/lecturers").then(res => res.data)
    ]);
});
</script>