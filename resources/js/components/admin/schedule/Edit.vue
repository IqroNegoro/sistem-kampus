<template>
    <div class="fixed overflow-y-auto inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
        @click.self="$emit('closeModalEdit')">
        <div class="w-full px-6 py-4 h-full md:h-5/6 overflow-y-auto bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            id="modal">
            <header class="flex justify-end">
                <button @click="$emit('closeModalEdit')"
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close">
                    <i class="bx bx-x"></i>
                </button>
            </header>
            <form @submit.prevent="form.put(route('schedules.update', schedule.id), {
                onSuccess: () => $emit('closeModalEdit')
            })" class="mt-4 mb-6 flex flex-col gap-4" enctype="multipart/form-data">
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Edit {{ schedule.course?.name }}
                </p>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Day</span>
                    <input v-model="form.day" type="date"
                        class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border-red-500 dark:border-red-500': form.errors.day}"
                        placeholder="Weeb Programming" />
                        <p class="text-red-500 font-medium" v-if="form.errors.day"> {{ form.errors.day }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Time</span>
                    <input v-model="form.time" type="time"
                        class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border-red-500 dark:border-red-500': form.errors.time}" />
                        <p class="text-red-500 font-medium" v-if="form.errors.time"> {{ form.errors.time }} </p>
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
                    <span class="text-gray-700 dark:text-gray-400">Academic Year</span>
                    <select v-model="form.year_id"
                        class="block w-full mt-1 text-sm dark border text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" :class="{'border-red-500 dark:border-red-500': form.errors.year_id}">
                        <option value="">Select</option>
                        <option v-for="year in years" :key="year.id" :value="year.id"> {{ year.year }} {{ year.semester }}
                        </option>
                    </select>
                        <p class="text-red-500 font-medium" v-if="form.errors.year_id"> {{ form.errors.year_id }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Class</span>
                    <select v-model="form.class_id"
                        class="block w-full mt-1 text-sm dark border text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" :class="{'border-red-500 dark:border-red-500': form.errors.class_id}">
                        <option value="">Select</option>
                        <option v-for="clas in classes" :key="clas.id" :value="clas.id"> {{ clas.name }}
                        </option>
                    </select>
                    <p class="text-red-500 font-medium" v-if="form.errors.class_id"> {{ form.errors.class_id }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Course</span>
                    <select v-model="form.course_id"
                        class="block w-full mt-1 text-sm dark border text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" :class="{'border-red-500 dark:border-red-500': form.errors.course_id}">
                        <option value="">Select</option>
                        <option v-for="course in courses" :key="course.id" :value="course.id"> {{ course.name }}
                        </option>
                    </select>
                    <p class="text-red-500 font-medium" v-if="form.errors.course_id"> {{ form.errors.course_id }} </p>
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
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Room</span>
                    <select v-model="form.room_id"
                        class="block w-full mt-1 text-sm dark border text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" :class="{'border-red-500 dark:border-red-500': form.errors.room_id}">
                        <option value="">Select</option>
                        <option v-for="room in rooms" :key="room.id" :value="room.id"> {{ room.room }}
                        </option>
                    </select>
                    <p class="text-red-500 font-medium" v-if="form.errors.room_id"> {{ form.errors.room_id }} </p>
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
import axios from "axios";
import { ref, onMounted } from "vue";
import { useForm } from "@inertiajs/vue3";

const { schedule } = defineProps(["schedule"]);
const emit = defineEmits(["closeModalEdit"]);

const form = useForm({
    day: schedule.day,
    time: schedule.time,
    study_id: schedule.study_id,
    year_id: schedule.year_id,
    class_id: schedule.class_id,
    course_id: schedule.course_id,
    lecturer_id: schedule.lecturer_id,
    room_id: schedule.room_id,
});

const studies = ref([]);
const years = ref([]);
const classes = ref([]);
const courses = ref([]);
const lecturers = ref([]);
const rooms = ref([]);

onMounted(async () => {
    [studies.value, years.value, classes.value, courses.value, lecturers.value, rooms.value] = await Promise.all([
        axios.get(route("studies.get")).then(res => res.data),
        axios.get(route("years.get")).then(res => res.data),
        axios.get(route("classes.get")).then(res => res.data),
        axios.get(route("courses.get")).then(res => res.data),
        axios.get(route("lecturers.get")).then(res => res.data),
        axios.get(route("rooms.get")).then(res => res.data),
    ])
});
</script>