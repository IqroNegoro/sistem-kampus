<template>
    <div class="fixed overflow-y-auto inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
        @click.self="$emit('closeModalInfo')">
        <div class="w-full px-6 py-4 h-full md:max-h-[85%] overflow-y-auto bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            id="modal">
            <header class="flex justify-end">
                <button @click="$emit('closeModalInfo')"
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                        <path
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </button>
            </header>
            <div class="mt-4 mb-6 flex flex-col gap-4">
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    {{ student.name }}
                </p>
                <img v-if="student.photo" :src="student.photo" alt="" class="mx-auto w-32 h-32 rounded-full object-center object-cover">
                <div v-else class="mx-auto w-32 h-32 rounded-full bg-black/50"></div>
                <div>
                    <p class="text-gray-700 dark:text-gray-400">NIM</p>
                    <span class="text-gray-700 dark:text-white text-sm">{{ student.nim }}</span>
                </div>
                <div>
                    <p class="text-gray-700 dark:text-gray-400">Name</p>
                    <span class="text-gray-700 dark:text-white text-sm"> {{ student.name }} </span>
                </div>
                <div>
                    <p class="text-gray-700 dark:text-gray-400">Gender</p>
                    <span class="text-gray-700 dark:text-white text-sm">{{ student.gender }}</span>
                </div>
                <div>
                    <p class="text-gray-700 dark:text-gray-400">Birth Place</p>
                    <span class="text-gray-700 dark:text-white text-sm">{{ student.birth_place }}</span>
                </div>
                <div>
                    <p class="text-gray-700 dark:text-gray-400">Birth Date</p>
                    <span class="text-gray-700 dark:text-white text-sm">{{ moment(student.birth).format("DD/MM/yyyy") }}</span>
                </div>
                <div>
                    <p class="text-gray-700 dark:text-gray-400">Address</p>
                    <span class="text-gray-700 dark:text-white text-sm">{{ student.address }}</span>
                </div>
                <div>
                    <p class="text-gray-700 dark:text-gray-400">Faculty</p>
                    <span class="text-gray-700 dark:text-white text-sm">{{ student.study?.name }}</span>
                </div>
                <div>
                    <p class="text-gray-700 dark:text-gray-400">Class</p>
                    <span class="text-gray-700 dark:text-white text-sm">{{ student.class?.name }}</span>
                </div>
                <div>
                    <p class="text-gray-700 dark:text-gray-400">Phone</p>
                    <span class="text-gray-700 dark:text-white text-sm">{{ student.phone }}</span>
                </div>
                <div>
                    <p class="text-gray-700 dark:text-gray-400">Email</p>
                    <span class="text-gray-700 dark:text-white text-sm">{{ student.email }}</span>
                </div>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                <button @click="$emit('closeModalInfo')" type="button"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Close
                </button>
            </footer>
        </div>
        </div>
    </div>
</template>
<script setup>
import moment from "moment";
defineEmits(["closeModalInfo"]);
const { student } = defineProps(["student"]);
</script>