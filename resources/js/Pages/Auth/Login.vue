<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import AuthProcessLayout from '@/Layouts/AuthProcessLayout.vue';
import ErrorMessage from "@/Components/ErrorMessage.vue"
import LoadingComponent from "@/Components/LoadingComponent.vue"

const form = useForm({
    email: "",
    password: "",
    remember_me: false
})

function submit(){
    form.post("/login")
}

</script>

<template>
    <AuthProcessLayout>
        <div class="">
            <div class="flex justify-end mt-4 md:mt-0">
                <div class="flex space-x-8 items-center">
                    <h1 class="font-bold">Don't have an account yet?</h1>
                    <Link :href="route('register.scriptwritter')" as="button" class="border border-primary rounded-md p-2 uppercase">Sign up</Link>
                </div>
            </div>

            <h1 class="text-primary text-4xl text-center font-bold uppercase my-10">Login</h1>

            <p>It's nice to have you back, <br /> Sign in to find the perfect script for you</p>

            <form @submit.prevent="submit" class="my-10 flex flex-col space-y-4">
                <div class="">
                    <label for="email" class="text-xl text-gray-500">Email Address</label> <br />
                    <div class="bg-white p-2 flex space-x-4 items-center border border-gray-400 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                        <input type="email" name="email" id="email" v-model="form.email" placeholder="Email" class="p-0 border-none outline-none focus:ring-0" required>
                    </div>
                    <ErrorMessage v-if="form.errors.email">{{ form.errors.email }}</ErrorMessage>
                </div>

                <div class="">
                    <label for="password" class="text-xl text-gray-500">Password</label> <br />
                    <div class="bg-white p-2 flex space-x-4 items-center border border-gray-400 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                        <input type="password" name="password" id="password" v-model="form.password" placeholder="Password" class="p-0 border-none outline-none focus:ring-0" required>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="flex space-x-4 items-center">
                        <input type="checkbox" name="remember_me" id="remember_me" v-model="form.remember_me"  class="border border-gray-400 rounded-sm">
                        <label for="remember_me" class="text-xl text-gray-500">Remember me</label>
                    </div>
                    
                    <Link href="#" class="text-xl text-gray-500">Forget password?</Link>
                </div>

                <div class="flex">
                    <LoadingComponent v-if="form.processing" class="border-2 border-primary"/>
                    <input type="submit" value="Login" v-else class="rounded-md bg-primary text-white font-bold py-2 px-4 cursor-pointer">
                </div>
            </form>

        </div>
    </AuthProcessLayout>
</template>