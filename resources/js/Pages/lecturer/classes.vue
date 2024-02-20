<template>
    <Head title="Classes" />
    <div class="flex flex-col gap-4">
        <div class="flex justify-between">
            <h1 class="text-white font-medium text-3xl">Classes</h1>
        </div>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <Header />
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Generation</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Program Study</th>
                            <th class="px-4 py-3">Lecturer</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <Rows v-for="clas in classes.data" :key="clas.id" :clas="clas" @edit-class="id => editClass = classes.data.find(v => v.id === id)" />
                    </tbody>
                </table>
            </div>
            <Paginator :links="classes" />
        </div>
    </div>
</template>
<script setup>
import Rows from "@/components/lecturer/classes/Rows.vue";
import Paginator from "@/components/Paginator.vue";
import Header from "@/components/Header.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps(["classes"]);
</script>