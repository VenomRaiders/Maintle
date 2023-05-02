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
        <div class="form-container">
            <h1 class="text-[var(--primary-color)] text-3xl text-center font-bold uppercase">Login</h1>
            
            <form @submit.prevent="submit">
                <p>It's nice to have you back, <br /> Sign in to find the perfect script for you</p>
                <div class="form-inputs">
                    <label for="email">Email Address</label>
                    <div class="bg-white p-2 flex space-x-4 items-center border border-gray-400 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                        <input type="email" name="email" id="email" v-model="form.email" placeholder="Email" class="p-0 border-none outline-none focus:ring-0" required>
                    </div>
                    <ErrorMessage v-if="form.errors.email">{{ form.errors.email }}</ErrorMessage>
                </div>

                <div class="form-inputs">
                    <label for="password">Password</label>
                    <div class="bg-white p-2 flex space-x-4 items-center border border-gray-400 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                        <input type="password" name="password" id="password" v-model="form.password" placeholder="Password" class="p-0 border-none outline-none focus:ring-0" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="flex space-x-1 items-center">
                        <input type="checkbox" name="remember_me" id="remember_me" v-model="form.remember_me"  class="border border-gray-400 rounded-sm">
                        <label for="remember_me" class="">Remember me</label>
                    </div>
                    
                </div>
                
                <div class="flex">
                    <LoadingComponent v-if="form.processing" class="border-2 border-primary"/>
                    <input type="submit" value="Login" v-else class="rounded-md bg-[var(--primary-color)] text-white font-bold py-2 px-4 cursor-pointer">
                </div>
                <p>Forgot your password? 
                    <Link :href="route('password.request')" class="auth-link">Reset password</Link>
                </p>
                <p>Don't have an account yet?
                    <Link :href="route('register.scriptwritter')" class="auth-link">Sign up</Link>
                </p>
            </form>

        </div>
    </AuthProcessLayout>
</template>
<style scoped>

/* Mobile styling first */

.form-container {
    padding: 35px;
    background-color: white;
    border: 1px solid var(--border-color);
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.form-container h1 {
    font-size: 30px;
    font-family: 'Montserrat', sans-serif;
}


form {
    width: 90%;
}

.form-inputs {
    margin-top: 10px;
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.form-inputs input {
    width: 100%;
    height: inherit;
    padding: 2px;
    border-radius: 5px;
}

.form-inputs label {
    font-weight: bold;
}

.form-group {
    margin: 20px 0px 20px;
}


.form-container p {
    margin: 20px 0px 20px;
}

/* responsive for desktop sizes */

@media only screen and (min-width: 1100px) {
    .form-container {
        width: 700px;
        margin-left: auto;
        margin-right: auto;
    }
    
    form {
        width: 100%;
        align-items: center;
    }
}


</style>