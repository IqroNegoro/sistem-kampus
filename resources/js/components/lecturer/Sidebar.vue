<template>
    <aside class="z-20 w-64 overflow-y-auto bg-white dark:bg-gray-800 flex-shrink-0">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <div class="flex flex-col justify-center items-center">
                <p class="text-lg font-bold text-gray-800 dark:text-gray-200">
                  Academic System
                </p>
                <p>Welcome {{ $page.props.auth.name }}</p>
            </div>
          <ul class="mt-6">
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="$page.url == '/'"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/" :class="{'dark:text-gray-200': $page.url == '/'}">
                <i class="bx bxs-dashboard"></i>
                <span class="ml-4">Dashboard</span>
              </Link>
            </li>
          </ul>
          <ul>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('lecturer.schedules')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('lecturer.schedules')" :class="{'dark:text-gray-200': route().current('lecturer.schedules')}">
                <i class='bx bxs-user-badge'></i>
                <span class="ml-4">Schedules</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <button class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" @click="router.delete('logout')">
                <i class='bx bx-log-out'></i>
                <span class="ml-4">Log Out</span>
              </button>
            </li>
          </ul>
        </div>
      </aside>
</template>
<script setup>
import { Link, router } from "@inertiajs/vue3"
import { ref } from 'vue';

const isSideMenuOpen = ref(false);
const isPagesMenuOpen = ref(false);
</script>