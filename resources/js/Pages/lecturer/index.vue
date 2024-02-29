<template>
    <Head title="Dashboard" />
    <div class="flex flex-col gap-4">
        <div class="flex justify-between">
            <h1 class="text-white font-medium text-3xl">Profile</h1>
        </div>
        <div class="w-full mb-8 rounded-lg shadow-xs">
            <div class="w-full rounded-sm shadow-xs bg-gray-800 p-4">
                <p class="text-white font-medium text-xl">Biodata</p>
                <img :src="$page.props.auth.photo" :alt="$page.props.auth.name" class="rounded-full w-48 h-48 aspect-square object-center object-cover mx-auto">
                <div class="text-white font-medium my-2 flex flex-col gap-1">
                    <table class="w-full whitespace-no-wrap">
                        <tbody>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">NIDN</th>
                                <th>:</th>
                                <th class="px-4 py-3">{{ $page.props.auth.nidn }}</th>
                            </tr>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Name</th>
                                <th>:</th>
                                <th class="px-4 py-3">{{ $page.props.auth.name }}</th>
                            </tr>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Email</th>
                                <th>:</th>
                                <th class="px-4 py-3">{{ $page.props.auth.email }}</th>
                            </tr>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Phone</th>
                                <th>:</th>
                                <th class="px-4 py-3">{{ $page.props.auth.phone }}</th>
                            </tr>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Address</th>
                                <th>:</th>
                                <th class="px-4 py-3">{{ $page.props.auth.address }}</th>
                            </tr>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Birth Place</th>
                                <th>:</th>
                                <th class="px-4 py-3">{{ $page.props.auth.birth_place }}</th>
                            </tr>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Birth</th>
                                <th>:</th>
                                <th class="px-4 py-3">{{ $page.props.auth.birth }}</th>
                            </tr>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Gender</th>
                                <th>:</th>
                                <th class="px-4 py-3">{{ $page.props.auth.gender }}</th>
                            </tr>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Faculty</th>
                                <th>:</th>
                                <th class="px-4 py-3"> {{ $page.props.auth?.faculty?.name }}</th>
                            </tr>
                        </tbody>
                    </table>
                    <button @click="editInfo = true"
                        class="w-max ml-auto px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        <p>Edit</p>
                    </button>
                </div>
            </div>
            <div class="w-full rounded-md shadow-xs">

            </div>
        </div>
    </div>
    <Edit v-if="editInfo" @close-modal-edit="editInfo = false" />
</template>
<script setup>
import Edit from "@/components/lecturer/Edit.vue";
import { ref } from "vue";
import { Head } from '@inertiajs/vue3';

const editInfo = ref(false);
</script>