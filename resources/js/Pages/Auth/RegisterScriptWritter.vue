<script setup>
import { useForm } from '@inertiajs/vue3';
import AuthProcessLayout from '@/Layouts/AuthProcessLayout.vue';
import ErrorMessage from "@/Components/ErrorMessage.vue"
import LoadingComponent from "@/Components/LoadingComponent.vue"

const form = useForm({
    profile_picture: null,
    username: "",
    age: "",
    email: "",
    password: "",
    password_confirmation: "",
    city: "",
    bio: "",
    gender: ""
})

function createAccount(){
    form.post("/register/scriptwritter")
}

</script>

<template>
    <AuthProcessLayout>
        <div class="">
            <h1 class="text-4xl font-bold uppercase my-6">Create Account</h1>

            <form @submit.prevent="createAccount" class="border-t-2 border-t-slate-500 py-4">
                <div class="flex flex-col space-y-2 mb-2">
                    <label for="profilePicture" class="font-bold text-black text-2xl">Upload picture</label>
                    <input type="file" name="profilePicture" id="profilePicture" @input="form.profile_picture = $event.target.files[0]">
                    <ErrorMessage v-if="form.errors.profile_picture">{{ form.errors.profile_picture }}</ErrorMessage>
                </div>

                <div class="flex flex-col md:flex-row md:justify-between space-y-2 md:space-y-0 md:space-x-2 mb-4">
                    <div class="flex flex-col space-y-2 md:w-1/2">
                        <label for="username" class="font-bold text-black text-2xl">Username</label>
                        <input type="text" name="username" id="username" v-model="form.username" class="p-1 outline-none border-2 border-black focus:border-black focus:ring-0">
                        <ErrorMessage v-if="form.errors.username">{{ form.errors.username }}</ErrorMessage>
                    </div>
                    
                    <div class="flex flex-col space-y-2 md:w-1/2">
                        <label for="age" class="font-bold text-black text-2xl">Age</label>
                        <input type="number" name="age" id="age" v-model="form.age" class="p-1 outline-none border-2 border-black focus:border-black focus:ring-0">
                        <ErrorMessage v-if="form.errors.age">{{ form.errors.age }}</ErrorMessage>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row md:space-x-2 h-full">
                    <div class="md:w-2/4">
                        <div class="flex flex-col space-y-2 mb-2">
                            <label for="email" class="font-bold text-black text-2xl">Email</label>
                            <input type="email" name="email" id="email" v-model="form.email" class="p-1 outline-none border-2 border-black focus:border-black focus:ring-0">
                            <ErrorMessage v-if="form.errors.email">{{ form.errors.email }}</ErrorMessage>
                        </div>

                        <div class="flex flex-col space-y-2 mb-2">
                            <label for="password" class="font-bold text-black text-2xl">Password</label>
                            <input type="password" name="password" id="password" v-model="form.password" class="p-1 outline-none border-2 border-black focus:border-black focus:ring-0">
                            <ErrorMessage v-if="form.errors.password">{{ form.errors.password }}</ErrorMessage>
                        </div>

                        <div class="flex flex-col space-y-2 mb-2">
                            <label for="passwordConfirmation" class="font-bold text-black text-2xl">Confirm password</label>
                            <input type="password" name="passwordConfirmation" id="passwordConfirmation" v-model="form.password_confirmation" class="p-1 outline-none border-2 border-black focus:border-black focus:ring-0">
                        </div>

                        <div class="flex flex-col space-y-2 mb-2">
                            <label for="city" class="font-bold text-black text-2xl">City</label>
                            <input type="Text" name="city" id="city" v-model="form.city" class="p-1 outline-none border-2 border-black focus:border-black focus:ring-0">
                            <ErrorMessage v-if="form.errors.city">{{ form.errors.city }}</ErrorMessage>
                        </div>

                        <div class="flex flex-col space-y-2 my-4">
                            <label class="font-bold text-black text-2xl">Gender</label>
                            <div class="flex justify-around">
                                <div class="flex space-x-4 items-center">
                                    <input type="radio" name="gender" id="male" v-model="form.gender" value="male">
                                    <label>Male</label>
                                </div>
                                <div class="flex space-x-4 items-center">
                                    <input type="radio" name="gender" id="female" v-model="form.gender" value="female">
                                    <label>Female</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:w-2/4 flex flex-col space-y-8">
                        <div class="flex flex-col space-y-2">
                            <label for="bio" class="font-bold text-black text-2xl">Bio</label>
                            <textarea name="bio" id="bio" v-model="form.bio" rows="10"></textarea>
                            <ErrorMessage v-if="form.errors.bio">{{ form.errors.bio }}</ErrorMessage>
                        </div>

                        <div class="flex justify-center">
                            <LoadingComponent v-if="form.processing" class="border-2 border-primary"/>
                            <input type="submit" value="Confirm" v-else class="rounded-md bg-primary text-white font-bold py-2 px-4 cursor-pointer">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </AuthProcessLayout>
</template>