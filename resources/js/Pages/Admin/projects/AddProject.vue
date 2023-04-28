<script setup>
import { ref, reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';
import AdminDashboardLayout from "@/Layouts/AdminDashboardLayout.vue";
import StandardButton from '@/Components/StandardButton.vue';
import ErrorMessage from "@/Components/ErrorMessage.vue";
import LoadingComponent from "@/Components/LoadingComponent.vue";

const props = defineProps(['genres'])

const showLeadCast = ref(false)
const showCrewRoles = ref(false)

const singleLeadCast = reactive({
    "name": "",
    "socialMediaHandle": ""
})

const singleCrew = reactive({
    "scriptwriter": "",
    "director": "",
    "gender": "",
    "socialMediaHandle": "",
    "previousWork": ""
})

const leadCast = reactive({values: []})

const crew = reactive({values: []})

const form = useForm({
  "title": "",
  "logline": "",
  "synopsis": "",
  "genre": [],
  "movie_format": "",
  "lead_cast": leadCast.values,
  "crew": crew.values
})

function addLeadCast() {
  leadCast.values.push({
    name: singleLeadCast.name,
    socialMediaHandle: singleLeadCast.socialMediaHandle
  })
  singleLeadCast.name = ""
  singleLeadCast.socialMediaHandle = ""
}

function addCrew(){
    crew.values.push({
        "scriptwriter" : singleCrew.scriptwriter,
        "director" : singleCrew.director,
        "gender" : singleCrew.gender,
        "socialMediaHandle" : singleCrew.socialMediaHandle,
        "previousWork": singleCrew.previousWork
    })
    singleCrew.scriptwriter = ""
    singleCrew.director = ""
    singleCrew.gender = ""
    singleCrew.socialMediaHandle = ""
    singleCrew.previousWork = ""
}

function removeLeadCast(leadC) {
  let newLeadCast = leadCast.values.filter((cast) => {
    return cast.name != leadC.name
  })
  leadCast.values = newLeadCast
}

function removeCrew(cr){
    let newCrew = crew.values.filter((c) => {
        return c.scriptwriter != cr.scriptwriter
    })
    crew.values = newCrew
}

function submitForm(){
  form.post("/admin/project/add_project")
}
</script>

<template>
    <AdminDashboardLayout>
        <div class="">
            <h1 class="text-center text-2xl uppercase font-bold">New Project</h1>
            <form @submit.prevent="submitForm" class="w-full">
                <div class="w-full flex flex-col space-y-4 md:flex-row justify-between">
                    <div class="w-full md:w-1/2 px-2 mb-2">
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
                        <select v-model="form.genre" name="mainGenre" id="mainGenre" multiple>
                        <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.genre }}</option>
                        </select>
                        <ErrorMessage v-if="form.errors.genre">{{ form.errors.genre }}</ErrorMessage>
                    </div>

                    <div class="form-group">
                        <label for="movieFormat" class="font-bold text-2xl">Movie Format</label> <br />
                        <select v-model="form.movie_format" name="movie_format" id="movie_format">
                        <option value="Feature Movie">Feature Movie</option>
                        <option value="Short Film">Short Film</option>
                        <option value="Documentary">Documentary</option>
                        <option value="Series">Series</option>
                        </select>
                        <ErrorMessage v-if="form.errors.movie_format">{{ form.errors.movie_format }}</ErrorMessage>
                    </div>

                    </div>
                    <div class="w-full md:w-1/2">
                        <label for="" class="font-bold text-2xl">Lead Cast</label>
                        <StandardButton @click.prevent="showLeadCast = !showLeadCast" text="Enter Lead Cast" />
                        <ErrorMessage v-if="form.errors.lead_cast">{{ form.errors.lead_cast }}</ErrorMessage>
                        <div v-if="showLeadCast">
                            <div class="my-2 p-1 border">
                                <ul v-if="leadCast.values.length != 0" class="h-48 overflow-y-scroll cursor-pointer">
                                    <li v-for="leadC in leadCast.values" :key="leadC" @click.prevent="removeLeadCast(leadC)" class="text-sm bg-slate-300 my-1">
                                        <span><strong>Name</strong>: {{ leadC.name }}</span> <br />
                                        <span><strong>Handle</strong>: {{ leadC.socialMediaHandle }}</span>
                            </li>
                        </ul>
                        <h6 v-else class="font-bold">No lead cast added yet</h6>
                        </div>
                        <div class="border my-2 p-1">
                        <div class="form-group">
                            <label for="fullName" class="font-bold">Full Name</label> <br />
                            <input type="text" v-model="singleLeadCast.name" name="fullName" id="fullName" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                        </div>
                        
                        <div class="form-group">
                            <label for="name" class="font-bold">Social media handle</label> <br />
                            <input type="text" v-model="singleLeadCast.socialMediaHandle" name="name" id="name" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                        </div>
                        <StandardButton @click.prevent="addLeadCast" text="Add" class="mt-4"/>
                    </div>
                </div>
                    </div>
                    <div class="w-full md:w-1/5">
                    <label for="" class="font-bold text-2xl">Crew</label>
                    <StandardButton @click.prevent="showCrewRoles = !showCrewRoles" text="Enter Crew" />
                    <ErrorMessage v-if="form.errors.crew">{{ form.errors.crew }}</ErrorMessage>
                    <div v-if="showCrewRoles">
                        <div class="my-2 p-1 border">
                        <ul v-if="crew.values.length != 0" class="h-48 overflow-y-scroll cursor-pointer">
                            <li v-for="cr in crew.values" :key="cr" @click.prevent="removeCrew(cr)" class="text-sm bg-slate-300 my-1">
                                <span><strong>ScriptWritter</strong>: {{ cr.scriptwriter }}</span> <br />
                                <span><strong>Director</strong>: {{ cr.director }}</span> <br />
                                <span><strong>Gender</strong>: {{ cr.gender }}</span> <br />
                                <span><strong>Social media handle</strong>: {{ cr.socialMediaHandle }}</span> <br />
                                <span><strong>Link to previous work</strong>: {{ cr.previousWork }}</span>
                            </li>
                        </ul>
                        <h6 v-else class="font-bold">No crew added yet</h6>
                        </div>
                        <div class="border my-2 p-1">
                        <div class="form-group">
                            <label for="scriptwriter" class="font-bold">Scriptwriter</label> <br />
                            <input type="text" v-model="singleCrew.scriptwriter" name="scriptwriter" id="scriptwriter" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                        </div>
                
                        <div class="form-group">
                            <label for="director" class="font-bold">Director</label> <br />
                            <input type="text" v-model="singleCrew.director" name="director" id="director" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
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
                            <input type="text" v-model="singleCrew.socialMediaHandle" name="name" id="name" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                        </div>
                
                        <div class="form-group">
                            <label for="name" class="font-bold">Links to previous works</label> <br />
                            <textarea name="" v-model="singleCrew.previousWork" id="synopsis" class="w-full bg-[#7dd1b8] rounded-md text-white"></textarea>
                        </div>
                        <StandardButton @click.prevent="addCrew" text="Add" class="mt-4"/>
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
