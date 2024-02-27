<template>
    <div class="fixed overflow-y-auto inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
        @click.self="$emit('closeModalEdit')">
        <div class="w-full px-6 py-4 h-96 bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
            id="modal">
            <header class="flex justify-end">
                <button @click="$emit('closeModalEdit')"
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                    aria-label="close">
                    <i class="bx bx-x"></i>
                </button>
            </header>
            <form @submit.prevent="form.put(route('roles.update', role.id), {
                onSuccess: () => $emit('closeModalEdit')
            })" class="mt-4 mb-6 flex flex-col gap-4 h-full" enctype="multipart/form-data">
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Edit Role {{ role.name }}
                </p>
                <div class="h-full w-full overflow-y-auto">
                    <label class="flex items-center dark:text-gray-400">
                        <input :checked="form.permissions.length == permissions.length"
                        type="checkbox" @change="e => e.target.checked ? form.permissions = permissions.map(v => v.id) : form.permissions = []"
                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray mr-4"
                        /> Select All
                    </label>
                    <label class="flex items-center dark:text-gray-400" v-for="permission in permissions" :key="permission.id">
                        <input :checked="form.permissions.find(v => v.id === permission.id)" v-model="form.permissions"
                        type="checkbox" :value="permission.id"
                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray mr-4"
                        /> {{ transform(permission.name) }}
                    </label>
                </div>
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

const { role } = defineProps(["role"]);
const emit = defineEmits(["closeModalEdit"]);

const form = useForm({
    permissions: role.permissions.map(v => v.id),
});

const permissions = ref([]);

onMounted(async () => {
    permissions.value = await axios.get(route("permissions.get")).then(res => res.data);
});

const transform = str => str.replace("-", " ").replace(/^\w|\s\w/gi, x => x.toUpperCase());
</script>