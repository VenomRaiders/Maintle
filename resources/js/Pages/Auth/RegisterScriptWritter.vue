<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import AuthProcessLayout from '@/Layouts/AuthProcessLayout.vue';
import ErrorMessage from "@/Components/ErrorMessage.vue"
import LoadingComponent from "@/Components/LoadingComponent.vue"

const form = useForm({
    profile_picture: null,
    username: "",
    date_of_birth: "",
    email: "",
    phone_number: "",
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
        <div class="form-container">
            <h1 class="text-2xl font-bold uppercase">Create A Scriptwritter Account</h1>
            
            <form @submit.prevent="createAccount" class="">
                <hr class="st">
                <div class="form-inputs">
                    <label for="profilePicture">Upload picture</label>
                    <input type="file" name="profilePicture" id="profilePicture" @input="form.profile_picture = $event.target.files[0]">
                    <ErrorMessage v-if="form.errors.profile_picture">{{ form.errors.profile_picture }}</ErrorMessage>
                </div>
                <div class="form-inputs">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" v-model="form.username" class="p-1 outline-none border-2 border-black focus:border-black focus:ring-0">
                    <ErrorMessage v-if="form.errors.username">{{ form.errors.username }}</ErrorMessage>
                </div>
                <div class="form-inputs">
                    <label for="date_of_birth">Date of birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" v-model="form.date_of_birth" class="p-1 outline-none border-2 border-black focus:border-black focus:ring-0">
                    <ErrorMessage v-if="form.errors.date_of_birth">{{ form.errors.date_of_birth }}</ErrorMessage>
                </div>
                <div class="form-inputs">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" v-model="form.email" class="p-1 outline-none border-2 border-black focus:border-black focus:ring-0">
                    <ErrorMessage v-if="form.errors.email">{{ form.errors.email }}</ErrorMessage>
                </div>

                <div class="form-inputs">
                    <label for="phone_number">Phone number</label>
                    <input type="text" name="phone_number" id="phone_number" v-model="form.phone_number" class="p-1 outline-none border-2 border-black focus:border-black focus:ring-0">
                    <ErrorMessage v-if="form.errors.phone_number">{{ form.errors.phone_number }}</ErrorMessage>
                </div>

                <div class="form-inputs">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" v-model="form.password" class="p-1 outline-none border-2 border-black focus:border-black focus:ring-0">
                    <ErrorMessage v-if="form.errors.password">{{ form.errors.password }}</ErrorMessage>
                </div>

                <div class="form-inputs">
                    <label for="passwordConfirmation">Confirm password</label>
                    <input type="password" name="passwordConfirmation" id="passwordConfirmation" v-model="form.password_confirmation" class="p-1 outline-none border-2 border-black focus:border-black focus:ring-0">
                </div>

                <div class="form-inputs">
                    <label for="city">City</label>
                    <input type="Text" name="city" id="city" v-model="form.city" class="p-1 outline-none border-2 border-black focus:border-black focus:ring-0">
                    <ErrorMessage v-if="form.errors.city">{{ form.errors.city }}</ErrorMessage>
                </div>

                <div class="form-inputs">
                    <label>Gender</label>
                    <div class="gender">
                        <div class="input-group">
                            <input type="radio" name="gender" id="male" v-model="form.gender" value="male">
                            <label>Male</label>
                        </div>
                        <div class="input-group">
                            <input type="radio" name="gender" id="female" v-model="form.gender" value="female">
                            <label>Female</label>
                        </div>
                    </div>
                    <ErrorMessage v-if="form.errors.age">{{ form.errors.age }}</ErrorMessage>
                </div>
                <div class="form-inputs">
                    <label for="bio">Bio</label>
                    <textarea name="bio" id="bio" v-model="form.bio" rows="10"></textarea>
                    <ErrorMessage v-if="form.errors.bio">{{ form.errors.bio }}</ErrorMessage>
                </div>

                <p>Already have an account? <Link :href="route('login')" class="auth-link">Login</Link></p>
                
                <div class="submit-container">
                    <LoadingComponent v-if="form.processing" class="border-2 border-primary"/>
                    <input type="submit" value="Register" v-else class="rounded-md bg-[#316802] text-white font-bold py-2 px-4 cursor-pointer" style="text-align: center;">
                </div>
            </form>
        </div>
    </AuthProcessLayout>
</template>

<style scoped>

/* Mobile styling first */

.form-container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 15px;
    align-items: center;
    background-color: white;
    border: 1px solid var(--border-color);
    border-radius: 10px;
}

.st {
    height: 3px;
    background: linear-gradient(120deg, var(--primary-color), var(--alternate-color));
}

.form-container p {
    margin: 20px 0px 20px;
}

.form-container h1 {
    font-size: 20px;
    padding-bottom: 10px;
    font-family: 'Montserrat', sans-serif;
}

.form-inputs {
    margin-top: 20px;
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.form-inputs label {
    font-weight: bold;
}

.form-inputs input {
    border-radius: 5px;
    padding: 5px 10px;
    border: 1px solid gray;
    outline: none;
}

.form-inputs input[type=file] {
    border: none;
}

.form-inputs input[type=radio] {
    border: 1px solid var(--border-color);
}

.input-group {
    display: flex;
    align-items: center;
    gap: 5px;
}

.gender {
    display: flex;
    gap: 10px;
}

.submit-container {
    text-align: center;
}

@media only screen and (min-width: 1100px) {
    .form-container {
        width: 800px;
        margin-left: auto;
        margin-right: auto;
    }
    
    form {
        width: 100%;
    }
}

</style>