<template>
    <form class="flex justify-between px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800" @submit.prevent="router.get('',{search})">
        <div class="flex justify-center items-center flex-row gap-2">
            <label class="text-sm flex flex-row">
                <select v-model="rows"
                  class="block w-full text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" @change.prevent="router.get('',{rows})"
                >
                  <option value='10'>10</option>
                  <option value='25'>25</option>
                  <option value='50'>50</option>
                  <option value='75'>75</option>
                  <option value='100'>100</option>
                </select>
              </label>
              <p>Rows</p>
        </div>
        <div>
            <label class="text-sm flex flex-row justify-center items-center">
            <input v-model="search" name="search"
                  class="block w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-none rounded-tl-md rounded-bl-md"
                  placeholder="Search"
                />
                <button class="h-full bg-purple-600 flex justify-center items-center p-2 rounded-tr-md rounded-br-md">
                    <i class="bx bx-search text-white"></i>
                </button>
              </label>
        </div>
    </form>
</template>
<script setup>
import { router } from "@inertiajs/vue3";
import { ref } from "vue";
const search = ref(new URLSearchParams(window.location.search).get("search"));
const rows = ref(new URLSearchParams(window.location.search).get("rows") || 10);
</script>