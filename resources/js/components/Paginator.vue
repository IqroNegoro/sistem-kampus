<template>
    <div
        class="flex justify-between px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
        <span class="flex items-center col-span-3">
            Showing {{ links.from }}-{{ links.to }} of {{ links.total }}
        </span>
        <span class="col-span-2"></span>
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                    <!-- <button class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                        aria-label="Previous">
                        <i class="bx bx-chevron-left"></i>
                    </button> -->
                    <li v-for="link in links.links" :key="link.label">
                        <Link v-if="link.url != null" class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple" :class="{'bg-white text-black': link.active}" v-html="link.label" :href="link.url"></Link>
                    </li>
                    <!-- <li>
                        <button class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                            aria-label="Next">
                            <i class="bx bx-chevron-right"></i>
                        </button>
                    </li> -->
                </ul>
            </nav>
        </span>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
defineProps(["links"]);
</script>