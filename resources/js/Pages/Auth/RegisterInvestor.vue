<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import AuthProcessLayout from '@/Layouts/AuthProcessLayout.vue';
import ErrorMessage from "@/Components/ErrorMessage.vue"
import LoadingComponent from "@/Components/LoadingComponent.vue"

const form = useForm({
    profile_picture: null,
    username: "",
    email: "",
    phone_number: "",
    password: "",
    password_confirmation: "",
})

function createInvestor(){
    form.post("/register/investor", {
        preserveScroll: true,
        onSuccess: () => {
            form.reset('profile_picture', 'username', 'email', 'phone_number', 'password', 'password_confirmation')
        }
    })
}

</script>

<template>
    <AuthProcessLayout>
        <div class="">
            <h1 class="text-4xl font-bold uppercase my-6">Create An Investor Account</h1>

            <form @submit.prevent="createInvestor" class="my-10 flex flex-col space-y-4 border-t-2 border-t-slate-500">
                <div class="">
                    <div class="flex flex-col space-y-2 mb-2">
                        <label for="profilePicture" class="font-bold text-black text-2xl">Upload profile picture</label>
                        <input type="file" name="profilePicture" id="profilePicture" @change="form.profile_picture = $event.target.files[0]">
                        <ErrorMessage v-if="form.errors.profile_picture">{{ form.errors.profile_picture }}</ErrorMessage>
                    </div>

                    <label for="username" class="text-xl text-gray-500">Username</label> <br />
                    <div class="bg-white p-2 flex space-x-4 items-center border border-gray-400 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <input type="text" name="username" id="username" v-model="form.username" placeholder="Username" class="p-0 border-none outline-none focus:ring-0" required>
                    </div>
                    <ErrorMessage v-if="form.errors.username">{{ form.errors.username }}</ErrorMessage>
                </div>

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
                    <label for="phone_number" class="text-xl text-gray-500">Phone Number</label> <br />
                    <div class="bg-white p-2 flex space-x-4 items-center border border-gray-400 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                        <input type="text" name="phone_number" id="phone_number" v-model="form.phone_number" placeholder="Phone Number" class="p-0 border-none outline-none focus:ring-0" required>
                    </div>
                    <ErrorMessage v-if="form.errors.phone_number">{{ form.errors.phone_number }}</ErrorMessage>
                </div>

                <div class="">
                    <label for="password" class="text-xl text-gray-500">Password</label> <br />
                    <div class="bg-white p-2 flex space-x-4 items-center border border-gray-400 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                        <input type="password" name="password" id="password" v-model="form.password" placeholder="Password" class="p-0 border-none outline-none focus:ring-0" required>
                    </div>
                    <ErrorMessage v-if="form.errors.password">{{ form.errors.password }}</ErrorMessage>
                </div>

                <div class="">
                    <label for="password_confirmation" class="text-xl text-gray-500">Confirm Password</label> <br />
                    <div class="bg-white p-2 flex space-x-4 items-center border border-gray-400 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                        <input type="password" name="password_confirmation" id="password_confirmation" v-model="form.password_confirmation" placeholder="Confirm Password" class="p-0 border-none outline-none focus:ring-0" required>
                    </div>
                </div>

                <div class="flex justify-center">
                    <LoadingComponent v-if="form.processing" class="border-2 border-primary"/>
                    <input type="submit" value="Create Account" v-else class="rounded-md bg-[#316802] text-white font-bold py-2 px-4 cursor-pointer">
                </div>
            </form>

        </div>
    </AuthProcessLayout>
</template>