<script setup>
import { useForm } from '@inertiajs/vue3';
import AuthProcessLayout from '@/Layouts/AuthProcessLayout.vue';
import ErrorMessage from "@/Components/ErrorMessage.vue"
import LoadingComponent from "@/Components/LoadingComponent.vue"

const props = defineProps(['token', 'email'])

const form = useForm({
    token: props.token,
    email: props.email,
    password: "",
    password_confirmation: ""
})

function submit(){
    form.post("/reset-password")
    form.reset()
}

</script>

<template>
    <AuthProcessLayout>
        <div class="">

            <h1 class="text-primary text-4xl text-center font-bold uppercase my-10">Set up your new password</h1>
            
            <form @submit.prevent="submit" class="my-10 flex flex-col space-y-4">
                <div class="">
                    <label for="email" class="text-xl text-gray-500">Email Address</label> <br />
                    <div class="bg-gray-400 p-2 flex space-x-4 items-center border border-gray-400 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                        <input type="email" name="email" id="email" :value="email" placeholder="Email" class="bg-gray-400 p-0 border-none outline-none focus:ring-0" required disabled>
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

                <div class="">
                    <label for="password_confirmation" class="text-xl text-gray-500">Confirm Password</label> <br />
                    <div class="bg-white p-2 flex space-x-4 items-center border border-gray-400 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                        <input type="password" name="password_confirmation" id="password_confirmation" v-model="form.password_confirmation" placeholder="Confirm password" class="p-0 border-none outline-none focus:ring-0" required>
                    </div>
                </div>

                <div class="flex justify-center">
                    <LoadingComponent v-if="form.processing" class="border-2 border-primary"/>
                    <input type="submit" value="Change password" v-else class="rounded-md bg-primary text-white font-bold py-2 px-4 cursor-pointer">
                </div>
            </form>

        </div>
    </AuthProcessLayout>
</template>