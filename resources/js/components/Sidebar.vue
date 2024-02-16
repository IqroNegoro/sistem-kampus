<template>
    <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <div class="flex flex-row justify-center items-center">
                <p class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200">
                  Academic System
                </p>
            </div>
          <ul class="mt-6">
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="$page.url == '/dashboard'"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="#" :class="{'dark:text-gray-200': $page.url == '/dashboard'}">
                <i class="bx bxs-dashboard"></i>
                <span class="ml-4">Dashboard</span>
              </Link>
            </li>
          </ul>
          <ul>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="$page.url == '/lecturers'"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/lecturers" :class="{'dark:text-gray-200': $page.url == '/lecturers'}">
                <i class='bx bxs-user-badge'></i>
                <span class="ml-4">Lecturers</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="$page.url == '/students'"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="cards.html" :class="{'dark:text-gray-200': $page.url == '/students'}">
                <i class='bx bxs-user-detail'></i>
                <span class="ml-4">Students</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="$page.url == '/faculties'"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/faculties" :class="{'dark:text-gray-200': $page.url == '/faculties'}">
                <i class='bx bxs-institution'></i>
                <span class="ml-4">Faculties</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="$page.url == '/buildings'"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/buildings" :class="{'dark:text-gray-200': $page.url == '/buildings'}">
                <i class="bx bxs-buildings"></i>
                <span class="ml-4">Buildings</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="$page.url == '/class'"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="modals.html" :class="{'dark:text-gray-200': $page.url == '/class'}">
                <i class="bx bxs-group"></i>
                <span class="ml-4">Class</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="$page.url == '/courses'"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="tables.html" :class="{'dark:text-gray-200': $page.url == '/courses'}">
                <i class='bx bx-task'></i>
                <span class="ml-4">Courses</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="$page.url == '/rooms'"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/rooms" :class="{'dark:text-gray-200': $page.url == '/rooms'}">
                <i class='bx bxs-building' ></i>
                <span class="ml-4">Rooms</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="$page.url == '/schedules'"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="tables.html" :class="{'dark:text-gray-200': $page.url == '/schedules'}">
                <i class='bx bxs-calendar-alt'></i>
                <span class="ml-4">Schedules</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="$page.url == '/years'"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/years" :class="{'dark:text-gray-200': $page.url == '/years'}">
                <i class='bx bx-calendar'></i>
                <span class="ml-4">Academic Years</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="$page.url == '/studies'"></span> 
              <Link class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="/studies" :class="{'dark:text-gray-200': $page.url == '/studies'}">
                <i class='bx bx-list-ul'></i>
                <span class="ml-4">Studies</span>
              </Link>
            </li>
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true" v-if="$page.url === 'studies'"></span>
              <button class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" @click="isPagesMenuOpen = !isPagesMenuOpen">
                <span class="inline-flex items-center">
                <i class='bx bx-list-ul'></i>
                  <span class="ml-4">Studies</span>
                </span>
                <i class="bx bx-chevron-down"></i>
              </button>
              <template v-if="isPagesMenuOpen">
                <ul class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900">
                  <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <Link class="w-full" href="pages/login.html">Login</Link>
                  </li>
                  <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <Link class="w-full" href="pages/create-account.html">
                      Create account
                    </Link>
                  </li>
                  <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <Link class="w-full" href="pages/forgot-password.html">
                      Forgot password
                    </Link>
                  </li>
                  <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <Link class="w-full" href="pages/404.html">404</Link>
                  </li>
                  <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                    <Link class="w-full" href="pages/blank.html">Blank</Link>
                  </li>
                </ul>
              </template>
            </li>
          </ul>
          <div class="px-6 my-6">
            <button class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              Create account
              <span class="ml-2" aria-hidden="true">+</span>
            </button>
          </div>
        </div>
      </aside>
</template>
<script setup>
import { Link } from "@inertiajs/vue3"
import { ref } from 'vue';

const isSideMenuOpen = ref(false);
const isPagesMenuOpen = ref(false);
</script>