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
            <form @submit.prevent="handleUpdate" class="mt-4 mb-6 flex flex-col gap-4" enctype="multipart/form-data">
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Edit {{ lecturer.name }}
                </p>
                <label class="block text-sm">
                    <img v-if="form.photo" :src="render(form.photo)" alt="" class="mx-auto w-32 h-32 rounded-full object-center object-cover">
                    <img v-else-if="lecturer.photo" :src="`/` + lecturer.photo" alt="" class="mx-auto w-32 h-32 rounded-full object-center object-cover">
                    <div v-else class="mx-auto w-32 h-32 rounded-full bg-black/50"></div>
                    <input @change="handleFile"
                        class="hidden w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border-red-500 dark:border-red-500': form.errors.nidn}"
                        type="file" placeholder="123456789" />
                        <p class="text-red-500 font-medium text-center" v-if="form.errors.photo"> {{ form.errors.photo }} </p>
                    </label>
                    <button type="button" 
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" v-if="form.photo" :disabled="form.processing"
                    @click="form.photo = ''">Cancel</button>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">NIDN</span>
                    <input v-model="form.nidn"
                        class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border-red-500 dark:border-red-500': form.errors.nidn}"
                        type="number" placeholder="123456789" />
                        <p class="text-red-500 font-medium" v-if="form.errors.nidn"> {{ form.errors.nidn }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input v-model="form.name"
                        class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border-red-500 dark:border-red-500': form.errors.name}"
                        placeholder="Jane Doe" />
                        <p class="text-red-500 font-medium" v-if="form.errors.name"> {{ form.errors.name }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Gender</span>
                    <div class="mt-2" :class="{'border border-red-500': form.errors.gender}">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input type="radio" v-model="form.gender"
                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="accountType" value="Male" />
                            <span class="ml-2">Male</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio" v-model="form.gender"
                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="accountType" value="Female" />
                            <span class="ml-2">Female</span>
                        </label>
                    </div>
                    <p class="text-red-500 font-medium" v-if="form.errors.gender"> {{ form.errors.gender }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Birth Place</span>
                    <input v-model="form.birth_place"
                        class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border-red-500 dark:border-red-500': form.errors.birth_place}"
                        placeholder="Indonesia" />
                    <p class="text-red-500 font-medium" v-if="form.errors.birth_place"> {{ form.errors.birth_place }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Birth</span>
                    <input v-model="form.birth"
                        class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border-red-500 dark:border-red-500': form.errors.birth_place}"
                        placeholder="Indonesia" type="date" />
                    <p class="text-red-500 font-medium" v-if="form.errors.birth"> {{ form.errors.birth }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Address</span>
                    <input v-model="form.address"
                        class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border-red-500 dark:border-red-500': form.errors.address}"
                        placeholder="Indonesia" />
                        <p class="text-red-500 font-medium" v-if="form.errors.address"> {{ form.errors.address }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Faculty</span>
                    <select v-model="form.faculty_id"
                        class="block w-full mt-1 text-sm dark border text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" :class="{'border-red-500 dark:border-red-500': form.errors.faculty_id}">
                        <option value="">Select</option>
                        <option v-for="faculty in faculties" :key="faculty.id" :value="faculty.id"> {{ faculty.name }}
                        </option>
                    </select>
                    <p class="text-red-500 font-medium" v-if="form.errors.faculty_id"> {{ form.errors.faculty_id }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Phone</span>
                    <input v-model="form.phone"
                        class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border-red-500 dark:border-red-500': form.errors.phone}"
                        placeholder="+62" />
                        <p class="text-red-500 font-medium" v-if="form.errors.phone"> {{ form.errors.phone }} </p>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Email</span>
                    <input v-model="form.email"
                        class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border-red-500 dark:border-red-500': form.errors.email}"
                        type="email" placeholder="@gmail.com" />
                        <p class="text-red-500 font-medium" v-if="form.errors.email"> {{ form.errors.email }} </p>
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
import { useForm, router } from "@inertiajs/vue3";

const { lecturer } = defineProps(["lecturer"]);
const emit = defineEmits(["closeModalEdit"]);

const render = file => URL.createObjectURL(file);

const form = useForm({
    photo: "",
    nidn: lecturer.nidn,
    name: lecturer.name,
    birth_place: lecturer.birth_place,
    birth: lecturer.birth,
    address: lecturer.address,
    faculty_id: lecturer.faculty_id,
    phone: lecturer.phone,
    email: lecturer.email,
    gender: lecturer.gender
});

const handleUpdate = () => {
    router.post(route("lecturers.update", lecturer.id), {
        _method: "put",
        ...form,
    }, {
        onProgress: () => {
            form.processing = true;
        },
        onSuccess: () => {
            emit("closeModalEdit");
        },
        onError: err => {
            form.setError(err);
            form.processing = false;
        }
    });
}

const handleFile = ({target}) => {
    const file = target.files[0];

    if (!["jpeg","png","jpg","webp"].includes(file.type.split("/")[1])) {
        form.setError("photo", "Please select a  photo");
        return;
    }

    form.photo = file;
}

const faculties = ref([]);

onMounted(async () => {
    faculties.value = await axios.get(route('faculties.get')).then(res => res.data);
});
</script>