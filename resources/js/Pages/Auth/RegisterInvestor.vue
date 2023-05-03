<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import { ref, reactive } from 'vue';
import AuthProcessLayout from '@/Layouts/AuthProcessLayout.vue';
import ErrorMessage from "@/Components/ErrorMessage.vue"
import LoadingComponent from "@/Components/LoadingComponent.vue"


const workInCompany = reactive({
    name: "",
    link: ""
})

const ownProductionCompany = reactive({
    name: "",
    link: ""
})

const independentInvestor = reactive({
    field: "",
    link: ""
})

const form = useForm({
    profile_picture: null,
    username: "",
    email: "",
    phone_number: "",
    password: "",
    password_confirmation: "",
    previous_productions: "",
    number_of_productions: "",
    links_to_trailers: "",
    work_in_production_company: null,
    workInCompany: {
        name: "",
        link: ""
    },
    own_production_company: null,
    productionCompany: {
        name: "",
        link: ""
    },
    independent_investor: null,
    independentInvestor: {
        field: "",
        linkedin_link: ""
    }
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
        <div class="form-container">
            <h1 class="text-2xl font-bold uppercase">Create An Investor Account</h1>
            {{ form.errors }}
            <form @submit.prevent="createInvestor">
                <hr class="st">

                <div class="form-inputs">
                    <label for="profilePicture">Upload profile picture</label>
                    <input type="file" name="profilePicture" id="profilePicture" @change="form.profile_picture = $event.target.files[0]">
                    <ErrorMessage v-if="form.errors.profile_picture">{{ form.errors.profile_picture }}</ErrorMessage>
                </div>
                
                <div class="form-inputs">
                    <label for="username">Username</label>
                    <div class="bg-white p-2 flex space-x-4 items-center border border-gray-400 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <input type="text" name="username" id="username" v-model="form.username" placeholder="Username" class="p-0 border-none outline-none focus:ring-0" required>
                    </div>
                    <ErrorMessage v-if="form.errors.username">{{ form.errors.username }}</ErrorMessage>
                </div>

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
                    <label for="phone_number">Phone Number</label>
                    <div class="bg-white p-2 flex space-x-4 items-center border border-gray-400 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                        <input type="text" name="phone_number" id="phone_number" v-model="form.phone_number" placeholder="Phone Number" class="p-0 border-none outline-none focus:ring-0" required>
                    </div>
                    <ErrorMessage v-if="form.errors.phone_number">{{ form.errors.phone_number }}</ErrorMessage>
                </div>

                <div class="form-group">
                    <div class="form-inputs">
                        <label for="password">Password</label>
                        <div class="bg-white p-2 flex space-x-4 items-center border border-gray-400 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            <input type="password" name="password" id="password" v-model="form.password" placeholder="Password" class="p-0 border-none outline-none focus:ring-0" required>
                        </div>
                        <ErrorMessage v-if="form.errors.password">{{ form.errors.password }}</ErrorMessage>
                    </div>
    
                    <div class="form-inputs">
                        <label for="password_confirmation">Confirm Password</label>
                        <div class="bg-white p-2 flex space-x-4 items-center border border-gray-400 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            <input type="password" name="password_confirmation" id="password_confirmation" v-model="form.password_confirmation" placeholder="Confirm Password" class="p-0 border-none outline-none focus:ring-0" required>
                        </div>
                    </div>
                </div>
                <br />

                <h2 class="text-1xl font-bold uppercase">Setup Profile</h2>
                <hr>
                <div class="form-inputs">
                    <label for="previous_productions">Previous Productions</label>
                    <textarea name="previous_productions" id="previous_productions" v-model="form.previous_productions" rows="5" placeholder="Give few details on the previous productions you've worked on"></textarea>
                    <ErrorMessage v-if="form.errors.previous_productions">{{ form.errors.previous_productions }}</ErrorMessage>
                </div>

                <div class="form-inputs">
                    <label for="number_of_productions">Number of Productions</label>
                    <div class="bg-white p-2 flex space-x-4 items-center border border-gray-400 rounded-md">
                        <i class="fa-solid fa-earth-africa"></i>
                        <input type="number" name="number_of_productions" id="number_of_productions" v-model="form.number_of_productions" placeholder="Number of productions" class="p-0 border-none outline-none focus:ring-0" required>
                    </div>
                </div>

                <div class="form-inputs">
                    <label for="links_to_trailers">Links to trailers</label>
                    <textarea name="links_to_trailers" id="links_trailers" v-model="form.links_to_trailers" rows="10" placeholder="https://link-to-trailers"></textarea>
                    <ErrorMessage v-if="form.errors.links_to_trailers">{{ form.errors.links_to_trailers }}</ErrorMessage>
                </div>
                <div class="form-inputs">
                    <div class="form-group fix-radio">
                        <label>Do you work for a production company?</label>
                        <label for="company-yes">
                            Yes
                            <input type="radio" name="company" v-model="form.work_in_production_company" :value="true" id="company-yes">
                        </label>
                        <label for="company-no">
                            No
                            <input type="radio" name="company" id="company-no" v-model="form.work_in_production_company" :value="false">
                        </label>
                        
                    </div>
                    <div v-if="form.work_in_production_company" class="extra-info-container">
                        <div class="form-inputs">
                            <label for="company_name">Name</label>
                                <input type="text" name="company_name" id="company_name" v-model="form.workInCompany.name" placeholder="Comapny Name" class="p-0 border-none outline-none focus:ring-0" required>
                        </div>
                        <div class="form-inputs">
                            <label for="company_link">Production Company Link</label>
                            <input type="text" name="company_link" id="company_link" v-model="form.workInCompany.link" placeholder="Production Company Link" class="p-0 border-none outline-none focus:ring-0" required>
                        </div>
                    </div>
                </div>

                <div class="form-inputs">
                    <div class="form-group fix-radio">
                        <label>Do you own a production company?</label>
                        <label for="production-yes">
                            Yes
                            <input type="radio" name="production" id="production-yes" v-model="form.own_production_company" :value="true">
                        </label>
                        <label for="production-no">
                            No
                            <input type="radio" name="production" id="production-no" v-model="form.own_production_company" :value="false">
                        </label> 
                    </div>
                    <div v-if="form.own_production_company" class="extra-info-container">
                        <div class="form-inputs">
                            <label for="company_name">Name</label>
                                <input type="text" name="company_name" id="company_name" v-model="form.productionCompany.name" placeholder="Comapny Name" class="p-0 border-none outline-none focus:ring-0" required>
                        </div>
                        <div class="form-inputs">
                            <label for="company_link">Production Company Link</label>
                            <input type="text" name="company_link" id="company_link" v-model="form.productionCompany.link" placeholder="Production Company Link" class="p-0 border-none outline-none focus:ring-0" required>
                        </div>
                    </div>
                </div>

                <div class="form-inputs">
                    <div class="form-group fix-radio">
                        <label>Are you an independent investor?</label>
                        <label for="independent-yes">
                            Yes
                            <input type="radio" name="independent" id="independent-yes" v-model="form.independent_investor" :value="true">
                        </label>
                        <label for="independent-no">
                            No
                            <input type="radio" name="independent" id="independent-no" v-model="form.independent_investor" :value="false">
                        </label>
                    </div>
                    <div v-if="form.independent_investor" class="extra-info-container">
                        <div class="form-inputs">
                            <label for="business_field">Your Field of Business</label>
                                <input type="text" name="business_field" id="business_field" v-model="form.independentInvestor.field" placeholder="Enter business field" class="p-0 border-none outline-none focus:ring-0" required>
                        </div>
                        <div class="form-inputs">
                            <label for="linkedin_link">LinkedIn profile</label>
                            <input type="text" name="linkedin_link" id="linkedin_link" v-model="form.independentInvestor.linkedin_link" placeholder="LinkedIn profile link" class="p-0 border-none outline-none focus:ring-0" required>
                        </div>
                    </div>
                </div>


                <p>Already have an account? <Link :href="route('login')" class="auth-link">Login</Link></p>

                <div class="flex justify-center">
                    <LoadingComponent v-if="form.processing" class="border-2 border-primary"/>
                    <input type="submit" value="Create Account" v-else class="rounded-md bg-[#316802] text-white py-2 px-4 cursor-pointer">
                </div>
            </form>

        </div>
    </AuthProcessLayout>
</template>

<style scoped>
.form-container {
    padding: 15px;
    background-color: white;
    border: 1px solid var(--border-color);
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
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

.form-inputs input {
    width: 100%;
    height: inherit;
    padding: 2px;
    border-radius: 5px;
}

.form-inputs label {
    font-weight: bold;
}
.form-inputs input[type=file] {
    border: none;
}

.form-group {
    display: flex;
    gap: 10px;
}

.fix-radio input {
    width: auto;
    height: auto;
    padding: 10px;
    border-radius: 0px;
}

.fix-radio input:focus {
    border: 1px solid white;
    outline: none;
}

.extra-info-container {
    display: flex;
    gap: 10px;
    border: 1px solid var(--border-color);
    padding: 2px;
}

.extra-info-container input {
    border: 1px solid var(--border-color)
}


/* responsive for desktop sizes */

@media only screen and (min-width: 1100px) {
    .form-container {
        width: 800px;
        margin-left: auto;
        margin-right: auto;
    }
    
    form {
        width: 100%;
        align-items: center;
    }
}

</style>