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
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('index')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('index')" :class="{'dark:text-gray-200': route().current('index')}">
                <i class="bx bxs-dashboard"></i>
                <span class="ml-4">Dashboard</span>
              </Link>
            </li>
          </ul>
          <ul>
            <li class="relative px-6 py-3" v-if="$page.props.allRoles.includes('superadmin') || $page.props.can.includes('read-lecturer')">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('lecturers.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('lecturers.index')" :class="{'dark:text-gray-200': route().current('lecturers.*')}">
                <i class='bx bxs-user-badge'></i>
                <span class="ml-4">Lecturers</span>
              </Link>
            </li>
            <li class="relative px-6 py-3" v-if="$page.props.allRoles.includes('superadmin') || $page.props.can.includes('read-student')">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('students.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('students.index')" :class="{'dark:text-gray-200': route().current('students.*')}">
                <i class='bx bxs-user-detail'></i>
                <span class="ml-4">Students</span>
              </Link>
            </li>
            <li class="relative px-6 py-3" v-if="$page.props.allRoles.includes('superadmin') || $page.props.can.includes('read-faculty')">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('faculties.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('faculties.index')" :class="{'dark:text-gray-200': route().current('faculties.*')}">
                <i class='bx bxs-institution'></i>
                <span class="ml-4">Faculties</span>
              </Link>
            </li>
            <li class="relative px-6 py-3" v-if="$page.props.allRoles.includes('superadmin') || $page.props.can.includes('read-building')">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('buildings.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('buildings.index')" :class="{'dark:text-gray-200': route().current('buildings.*')}">
                <i class="bx bxs-buildings"></i>
                <span class="ml-4">Buildings</span>
              </Link>
            </li>
            <li class="relative px-6 py-3" v-if="$page.props.allRoles.includes('superadmin') || $page.props.can.includes('read-room')">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('rooms.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('rooms.index')" :class="{'dark:text-gray-200': route().current('rooms.*')}">
                <i class='bx bxs-building' ></i>
                <span class="ml-4">Rooms</span>
              </Link>
            </li>
            <li class="relative px-6 py-3" v-if="$page.props.allRoles.includes('superadmin') || $page.props.can.includes('read-class')">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('classes.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('classes.index')" :class="{'dark:text-gray-200': route().current('classes.*')}">
                <i class="bx bxs-group"></i>
                <span class="ml-4">Class</span>
              </Link>
            </li>
            <li class="relative px-6 py-3" v-if="$page.props.allRoles.includes('superadmin') || $page.props.can.includes('read-course')">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('courses.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('courses.index')" :class="{'dark:text-gray-200': route().current('courses.*')}">
                <i class='bx bx-task'></i>
                <span class="ml-4">Courses</span>
              </Link>
            </li>
            <li class="relative px-6 py-3" v-if="$page.props.allRoles.includes('superadmin') || $page.props.can.includes('read-schedule')">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('schedules.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('schedules.index')" :class="{'dark:text-gray-200': route().current('schedules.*')}">
                <i class='bx bxs-calendar-alt'></i>
                <span class="ml-4">Schedules</span>
              </Link>
            </li>
            <li class="relative px-6 py-3" v-if="$page.props.allRoles.includes('superadmin') || $page.props.can.includes('read-year')">
              <span class="absolute iYearsnse-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('years.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('years.index')" :class="{'dark:text-gray-200': route().current('years.*')}">
                <i class='bx bx-calendar'></i>
                <span class="ml-4">Academic Years</span>
              </Link>
            </li>
            <li class="relative px-6 py-3" v-if="$page.props.allRoles.includes('superadmin') || $page.props.can.includes('read-study')">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="route().current('studies.*')"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" :href="route('studies.index')" :class="{'dark:text-gray-200': route().current('studies.*')}">
                <i class='bx bx-list-ul'></i>
                <span class="ml-4">Studies</span>
              </Link>
            </li>
            <li class="relative px-6 py-3" v-if="$page.props.allRoles.includes('superadmin')">
              <button
                class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                @click="isAuthorizesMenuOpen = !isAuthorizesMenuOpen"
                aria-haspopup="true"
              >
                <span class="inline-flex items-center">
                  <i class="bx bx-lock-alt"></i>
                  <span class="ml-4">Authorizes</span>
                </span>
                <svg
                  class="w-4 h-4"
                  aria-hidden="true"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </button>
              <template v-if="isAuthorizesMenuOpen">
                <ul
                  class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                  aria-label="submenu"
                >
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <Link class="w-full" :href="route('roles.index')">Roles</Link>
                  </li>
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <Link class="w-full" :href="route('permissions.index')">
                      Permissions
                    </Link>
                  </li>
                </ul>
              </template>
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
const isAuthorizesMenuOpen = ref(false);
</script>