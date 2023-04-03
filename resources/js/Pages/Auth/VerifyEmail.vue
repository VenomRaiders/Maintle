<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import AuthProcessLayout from '@/Layouts/AuthProcessLayout.vue';
import ErrorMessage from "@/Components/ErrorMessage.vue"
import LoadingComponent from "@/Components/LoadingComponent.vue"

const form = useForm({
    email: "",
})

function submit(){
    form.post("/email/verification-notification")
}

</script>

<template>
    <AuthProcessLayout>
        <div class="">

            <h1 class="text-primary text-4xl text-center font-bold uppercase my-10">Verify your email address</h1>

            <p>We have sent a verification link to your email address.<br />Check your email and click on the link to continue</p>

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

                <div class="flex justify-center">
                    <LoadingComponent v-if="form.processing" class="border-2 border-primary"/>
                    <input type="submit" value="Resend Verification link" v-else class="rounded-md bg-primary text-white font-bold py-2 px-4 cursor-pointer">
                </div>
            </form>

        </div>
    </AuthProcessLayout>
</template>