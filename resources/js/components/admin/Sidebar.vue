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
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('lecturers.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('lecturers.index')" :class="{'dark:text-gray-200': route().current('lecturers.*')}">
                <i class='bx bxs-user-badge'></i>
                <span class="ml-4">Lecturers</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('students.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('students.index')" :class="{'dark:text-gray-200': route().current('students.*')}">
                <i class='bx bxs-user-detail'></i>
                <span class="ml-4">Students</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('faculties.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('faculties.index')" :class="{'dark:text-gray-200': route().current('faculties.*')}">
                <i class='bx bxs-institution'></i>
                <span class="ml-4">Faculties</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('buildings.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('buildings.index')" :class="{'dark:text-gray-200': route().current('buildings.*')}">
                <i class="bx bxs-buildings"></i>
                <span class="ml-4">Buildings</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('rooms.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('rooms.index')" :class="{'dark:text-gray-200': route().current('rooms.*')}">
                <i class='bx bxs-building' ></i>
                <span class="ml-4">Rooms</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('classes.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('classes.index')" :class="{'dark:text-gray-200': route().current('classes.*')}">
                <i class="bx bxs-group"></i>
                <span class="ml-4">Class</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('courses.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('courses.index')" :class="{'dark:text-gray-200': route().current('courses.*')}">
                <i class='bx bx-task'></i>
                <span class="ml-4">Courses</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('schedules.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('schedules.index')" :class="{'dark:text-gray-200': route().current('schedules.*')}">
                <i class='bx bxs-calendar-alt'></i>
                <span class="ml-4">Schedules</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('years.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('years.index')" :class="{'dark:text-gray-200': route().current('years.*')}">
                <i class='bx bx-calendar'></i>
                <span class="ml-4">Academic Years</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('studies.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('studies.index')" :class="{'dark:text-gray-200': route().current('studies.*')}">
                <i class='bx bx-list-ul'></i>
                <span class="ml-4">Studies</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <button class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" @click="router.delete(route('logout'))">
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