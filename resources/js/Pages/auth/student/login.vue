<template>
  <Head title="Login" />
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="w-96 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="flex items-center justify-center p-6 sm:p-12 w-full">
                    <form @submit.prevent="form.post(route('login.student.post'))" class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Students Portal
                        </h1>
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Email</span>
                            <input v-model="form.email"
                                class="block w-full mt-1 text-sm dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border border-red-500': form.errors.email}"
                                placeholder="Jane Doe" />
                                <p class="text-red-500" v-if="form.errors.email"> {{ form.errors.email }} </p>
                        </label>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Password</span>
                            <input v-model="form.password"
                                class="block w-full mt-1 text-sm dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border border-red-500': form.errors.password}"
                                placeholder="***************" type="password" />
                                <p class="text-red-500" v-if="form.errors.password"> {{ form.errors.password }} </p>
                        </label>
                        <p class="text-red-500 font-medium text-sm" v-if="$page.props.flash.error"> {{ $page.props.flash.error }}</p>
                        <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                          <i v-if="form.processing" class="bx bx-loader-alt bx-spin"></i>
                          <p v-else>Log In</p>
                        </button>
                        <hr class="my-8" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
import { Head } from "@inertiajs/vue3";

const form = useForm({
  email: "",
  password: ""
});
</script>