<template>
  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="w-96 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
      <div class="flex flex-col overflow-y-auto md:flex-row">
        <div class="flex items-center justify-center p-6 sm:p-12 w-full">
          <form class="w-full" @submit.prevent="form.post(route('register.post'))">
            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
              Create account
            </h1>
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Email</span>
              <input v-model="form.email" type="email"
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
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Confirm password
              </span>
              <input v-model="form.confirm"
                class="block w-full mt-1 text-sm dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" :class="{'border border-red-500': form.errors.confirm}"
                placeholder="***************" type="password" />
                <p class="text-red-500" v-if="form.errors.confirm"> {{ form.errors.confirm }} </p>
            </label>
<!-- 
            <div class="flex mt-6 text-sm">
              <label class="flex items-center dark:text-gray-400">
                <input type="checkbox"
                  class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" />
                <span class="ml-2">
                  I agree to the
                  <span class="underline">privacy policy</span>
                </span>
              </label>
            </div> -->

            <!-- You should use a button here, as the anchor is only used for the example  -->
            <button class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              Create account
            </button>
            <hr class="my-8" />
            <p class="mt-4">
              <Link class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" :href="route('login.get')">
                Already have an account? Login
              </Link>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
  email: "",
  password: "",
  confirm: ""
});
</script>