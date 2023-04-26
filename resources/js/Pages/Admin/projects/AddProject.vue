<script setup>
import { ref, reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';
import AdminDashboardLayout from "@/Layouts/AdminDashboardLayout.vue";
import StandardButton from '@/Components/StandardButton.vue';
import ErrorMessage from "@/Components/ErrorMessage.vue";
import LoadingComponent from "@/Components/LoadingComponent.vue";

const props = defineProps(['genres'])

const showLeadRoles = ref(false)
const showCrewRoles = ref(false)

const singleLeadRole = reactive({
  "realName": "",
  "characterName": "",
  "gender": "",
  "socialMediaHandle": ""
})

const leadRoles = reactive({values: []})

const form = useForm({
  "title": "",
  "logline": "",
  "synopsis": "",
  "genre": "",
  "movieFormat": "",
  "leadRoles": leadRoles.values
})

function addLeadRole() {
  leadRoles.values.push({
    name: singleLeadRole.name,
    socialMediaHandle: singleLeadRole.socialMediaHandle
  })
  singleLeadRole.name = ""
  singleLeadRole.socialMediaHandle = ""
}

function removeLeadRole(leadrole) {
  let newLeadRoles = leadRoles.values.filter((role) => {
    return role.name != leadrole.name
  })
  leadRoles.values = newLeadRoles
}

function submitForm(){
  form.post("/admin/add_project")
}
</script>

<template>
    <AdminDashboardLayout>
        <div class="content">
            <h1 class="text-center text-2xl uppercase font-bold">New Project</h1>
            <form @submit.prevent="submitForm" class="mt-4">
                <div class="flex flex-col space-y-4 md:flex-row justify-between">
                    <div class="w-full md:w-3/5 px-2 mb-2">
                    <div class="form-group mb-2">
                        <label for="title" class="font-bold text-2xl">Title</label> <br />
                        <input type="text" v-model="form.title" class="w-full bg-[#7dd1b8] rounded-md text-white" name="" id="title">
                        <ErrorMessage v-if="form.errors.title">{{ form.errors.title }}</ErrorMessage>
                    </div>

                    <div class="form-group mb-2">
                        <label for="logline" class="font-bold text-2xl">Logline</label> <br />
                        <input type="text" v-model="form.logline" class="w-full bg-[#7dd1b8] rounded-md text-white" name="" id="logline">
                        <ErrorMessage v-if="form.errors.logline">{{ form.errors.logline }}</ErrorMessage>
                    </div>

                    <div class="form-group mb-2">
                        <label for="synopsis" class="font-bold text-2xl">Synopsis</label> <br />
                        <textarea name="" v-model="form.synopsis" id="synopsis" class="w-full bg-[#7dd1b8] rounded-md text-white"></textarea>
                        <ErrorMessage v-if="form.errors.synopsis">{{ form.errors.synopsis }}</ErrorMessage>
                    </div>

                    <div class="form-group">
                        <label for="mainGenre" class="font-bold text-2xl">Genre</label> <br />
                        <select v-model="form.mainGenre" name="mainGenre" id="mainGenre" multiple>
                        <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.genre }}</option>
                        </select>
                        <ErrorMessage v-if="form.errors.mainGenre">{{ form.errors.mainGenre }}</ErrorMessage>
                    </div>

                    <div class="form-group">
                        <label for="movieFormat" class="font-bold text-2xl">Movie Format</label> <br />
                        <select v-model="form.movieFormat" name="movieFormat" id="movieFormat">
                        <option value="Feature Movie">Feature Movie</option>
                        <option value="Short Film">Short Film</option>
                        <option value="Documentary">Documentary</option>
                        <option value="Series">Series</option>
                        </select>
                        <ErrorMessage v-if="form.errors.movieFormat">{{ form.errors.movieFormat }}</ErrorMessage>
                    </div>

                    </div>
                    <div class="w-full md:w-1/5">
                        <label for="" class="font-bold text-2xl">Lead Cast</label>
                        <StandardButton @click.prevent="showLeadRoles = !showLeadRoles" text="Enter Lead Cast" />
                        <ErrorMessage v-if="form.errors.leadRoles">{{ form.errors.leadRoles }}</ErrorMessage>
                        <div v-if="showLeadRoles">
                            <div class="my-2 p-1 border">
                                <ul v-if="leadRoles.values.length != 0" class="h-48 overflow-y-scroll cursor-pointer">
                                    <li v-for="leadrole in leadRoles.values" :key="leadrole" @click.prevent="removeLeadRole(leadrole)" class="text-sm bg-slate-300 my-1">
                                        <span><strong>Name</strong>: {{ leadrole.name }}</span> <br />
                                        <span><strong>Handle</strong>: {{ leadrole.socialMediaHandle }}</span>
                            </li>
                        </ul>
                        <h6 v-else class="font-bold">No lead roles added yet</h6>
                        </div>
                        <div class="border my-2 p-1">
                        <div class="form-group">
                            <label for="fullName" class="font-bold">Full Name</label> <br />
                            <input type="text" v-model="singleLeadRole.fullName" name="fullName" id="fullName" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                        </div>
                        
                        <div class="form-group">
                            <label for="name" class="font-bold">Social media handle</label> <br />
                            <input type="text" v-model="singleLeadRole.socialMediaHandle" name="name" id="name" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                        </div>
                        <StandardButton @click.prevent="addLeadRole" text="Add" class="mt-4"/>
                    </div>
                </div>
                    </div>
                    <div class="w-full md:w-1/5">
                    <label for="" class="font-bold text-2xl">Crew</label>
                    <StandardButton @click.prevent="showCrewRoles = !showCrewRoles" text="Enter Crew" />
                    <ErrorMessage v-if="form.errors.leadRoles">{{ form.errors.leadRoles }}</ErrorMessage>
                    <div v-if="showLeadRoles">
                        <div class="my-2 p-1 border">
                        <ul v-if="leadRoles.values.length != 0" class="h-48 overflow-y-scroll cursor-pointer">
                            <li v-for="leadrole in leadRoles.values" :key="leadrole" @click.prevent="removeLeadRole(leadrole)" class="text-sm bg-slate-300 my-1">
                            <span><strong>Name</strong>: {{ leadrole.name }}</span> <br />
                            <span><strong>Handle</strong>: {{ leadrole.socialMediaHandle }}</span>
                            </li>
                        </ul>
                        <h6 v-else class="font-bold">No lead roles added yet</h6>
                        </div>
                        <div class="border my-2 p-1">
                        <div class="form-group">
                            <label for="scriptwriter" class="font-bold">Scriptwriter</label> <br />
                            <input type="text" v-model="singleLeadRole.scriptwriter" name="scriptwriter" id="scriptwriter" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                        </div>
                
                        <div class="form-group">
                            <label for="director" class="font-bold">Director</label> <br />
                            <input type="text" v-model="singleLeadRole.director" name="director" id="director" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                        </div>
                
                        <div class="form-group">
                            <label for="name" class="font-bold">Gender</label> <br />
                            Male
                            <input type="radio" name="gender" id="gender">
                            Female
                            <input type="radio" name="gender" id="gender">
                        </div>

                        <div class="form-group">
                            <label for="name" class="font-bold">Social media handle</label> <br />
                            <input type="text" v-model="singleLeadRole.socialMediaHandle" name="name" id="name" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                        </div>
                
                        <div class="form-group">
                            <label for="name" class="font-bold">Links to previous works</label> <br />
                            <textarea name="" v-model="form.synopsis" id="synopsis" class="w-full bg-[#7dd1b8] rounded-md text-white"></textarea>
                        </div>
                        <StandardButton @click.prevent="addLeadRole" text="Add" class="mt-4"/>
                        </div>
                    </div>
                    </div>
                </div>
        
                <div class="my-4">
                    <LoadingComponent v-if="form.processing" class="border-2 border-primary"/>
                    <input type="submit" value="Save" v-else class="px-4 py-2 rounded-md bg-primary text-white, font-bold text-center cursor-pointer">
                </div>
            </form>
        </div>
    </AdminDashboardLayout>
</template>

<style scoped>
/* Default styling is for mobile */

.content {
    margin-top: 20px;
    margin-bottom: 20px;
}

/* Scaling for desktop devices */

@media only screen and (min-width: 690px) {
    .content {
        display: flex;
        gap: 30px;
        justify-content: space-evenly;
    }
    .card {
        width: 100%;
    }
}

@media only screen and (min-width: 1200px) {
    .content {
        padding-top: 10px;
    }
}
</style>
