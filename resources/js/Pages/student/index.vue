<template>
    <Head title="Dashboard" />
    <div class="flex flex-col overflow-y-auto gap-4">
        <div class="flex justify-between">
            <h1 class="text-white font-medium text-3xl">Profile</h1>
        </div>
        <div class="w-full mb-8 rounded-lg shadow-xs">
            <div class="w-full rounded-sm shadow-xs bg-gray-800 p-4">
                <p class="text-white font-medium text-xl">Biodata</p>
                <div class="text-white font-medium my-2 flex flex-col gap-1">
                    <table class="w-full whitespace-no-wrap">
                        <tbody>
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
                                <th class="px-4 py-3">Program Study</th>
                                <th>:</th>
                                <th class="px-4 py-3"> {{ $page.props.auth?.study?.degree }} {{ $page.props.auth?.study?.name }}</th>
                            </tr>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Class</th>
                                <th>:</th>
                                <th class="px-4 py-3">{{ $page.props.auth?.class?.name }}</th>
                            </tr>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Lecturer</th>
                                <th>:</th>
                                <th class="px-4 py-3">{{ $page.props.auth?.class?.lecturer?.name }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="w-full rounded-md shadow-xs">

            </div>
        </div>
    </div>
</template>
<script setup>
import { Head } from '@inertiajs/vue3';
</script>