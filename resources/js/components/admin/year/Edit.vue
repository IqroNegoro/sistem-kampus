<template>
    <div class="fixed overflow-y-auto inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
        @click.self="$emit('closeModalEdit')">
        <div class="w-full px-6 py-4 h-full md:h-auto overflow-y-auto bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            id="modal">
            <header class="flex justify-end">
                <button @click="$emit('closeModalEdit')"
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close">
                    <i class="bx bx-x"></i>
                </button>
            </header>
            <form @submit.prevent="form.put(route('years.update', year.id), {
                onSuccess: () => $emit('closeModalEdit')
            })" class="mt-4 mb-6 flex flex-col gap-4" enctype="multipart/form-data">
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Edit {{ year.name }}
                </p>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Year</span>
                    <input v-model="form.year"
                    type="number"
                        class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border-red-500 dark:border-red-500': form.errors.year}"
                        :placeholder="new Date().getFullYear()" />
                        <p class="text-red-500 font-medium" v-if="form.errors.year"> {{ form.errors.year }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Semester</span>
                    <select v-model="form.semester" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="odd">Odd</option>
                        <option value="even">Even</option>
                    </select>
                        <p class="text-red-500 font-medium" v-if="form.errors.semester"> {{ form.errors.semester }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Status</span>
                    <div class="mt-2" :class="{'border border-red-500': form.errors.status}">
                        <label
                    class="inline-flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio" v-model="form.status"
                      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      value="1"
                    />
                    <span class="ml-2">Active</span>
                  </label>
                  <label
                    class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio" v-model="form.status"
                      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      value="0"
                    />
                    <span class="ml-2">Not Active</span>
                  </label>
                    </div>
                    <p class="text-red-500 font-medium" v-if="form.errors.status"> {{ form.errors.status }} </p>
                </label>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button @click="$emit('closeModalEdit')" type="button"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray" :disabled="form.processing">
                    Cancel
                </button>
                <button
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" :disabled="form.processing">
                    <i v-if="form.processing" class="bx bx-loader-alt bx-spin"></i>
                    <p v-else>Edit</p>
                </button>
            </footer>
        </form>
        </div>
    </div>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";

const { year } = defineProps(["year"]);
const emit = defineEmits(["closeModalEdit"]);

const form = useForm({
    year: year.year,
    semester: year.semester || "odd",
    status: year.status
});
</script>