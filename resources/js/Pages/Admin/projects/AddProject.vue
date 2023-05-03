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
  "cost": "",
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
        <div class="form-container">
            <div class="text-left w-full">
                <StandardButton text="Go Back" bg-color="var(--primary-color)" :is-link=true :href="route('admin.projects')" style="width: fit-content;"></StandardButton>
            </div>
            <h1 class="text-center text-2xl ">New Project</h1>
            {{ form.errors }}
            <form @submit.prevent="submitForm" class="w-full">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" v-model="form.title" id="title">
                    <ErrorMessage v-if="form.errors.title">{{ form.errors.title }}</ErrorMessage>
                </div>

                <div class="form-group">
                    <label for="logline">Logline</label>
                    <input type="text" v-model="form.logline" id="logline">
                    <ErrorMessage v-if="form.errors.logline">{{ form.errors.logline }}</ErrorMessage>
                </div>

                <div class="form-group">
                    <label for="synopsis">Synopsis</label>
                    <textarea v-model="form.synopsis" id="synopsis" rows="5"></textarea>
                    <ErrorMessage v-if="form.errors.synopsis">{{ form.errors.synopsis }}</ErrorMessage>
                </div>

                <div class="form-group">
                    <label for="cost">Project Cost</label>
                    <input type="number" v-model="form.cost" id="cost">
                    <ErrorMessage v-if="form.errors.cost">{{ form.errors.cost }}</ErrorMessage>
                </div>

                <div class="form-group">
                    <label for="mainGenre">Genre</label>
                    <select v-model="form.genre" name="mainGenre" id="mainGenre" multiple>
                    <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.genre }}</option>
                    </select>
                    <ErrorMessage v-if="form.errors.genre">{{ form.errors.genre }}</ErrorMessage>
                </div>

                <div class="form-group">
                    <label for="">Lead Cast</label>
                    <StandardButton @click.prevent="showLeadCast = !showLeadCast" text="Enter Lead Cast" style="width: fit-content;"/>
                    <ErrorMessage v-if="form.errors.lead_cast">{{ form.errors.lead_cast }}</ErrorMessage>
                    <div v-if="showLeadCast">
                        <div class="my-2 p-1 border">
                            <ul v-if="leadCast.values.length != 0" class="h-48 overflow-y-scroll cursor-pointer">
                                <li v-for="leadC in leadCast.values" :key="leadC" @click.prevent="removeLeadCast(leadC)" class="text-sm bg-slate-300 my-1">
                                    <span><strong>Name</strong>: {{ leadC.name }}</span>
                                    <span><strong>Handle</strong>: {{ leadC.socialMediaHandle }}</span>
                                 </li>
                            </ul>
                            <h6 v-else class="font-bold">No lead cast added yet</h6>
                        </div>
                        <div class="border my-2 p-1">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" v-model="singleLeadCast.name" name="fullName" id="fullName" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                            </div>
                        
                            <div class="form-group">
                                <label for="name" class="font-bold">Social media handle</label>
                                <input type="text" v-model="singleLeadCast.socialMediaHandle" name="name" id="name" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                            </div>
                            <StandardButton @click.prevent="addLeadCast" text="Add" class="mt-4"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Crew</label>
                    <StandardButton @click.prevent="showCrewRoles = !showCrewRoles" text="Enter Crew" style="width: fit-content;"/>
                    <ErrorMessage v-if="form.errors.crew">{{ form.errors.crew }}</ErrorMessage>
                    <div v-if="showCrewRoles">
                        <div class="my-2 p-1 border">
                            <ul v-if="crew.values.length != 0" class="h-48 overflow-y-scroll cursor-pointer">
                                <li v-for="cr in crew.values" :key="cr" @click.prevent="removeCrew(cr)" class="text-sm bg-slate-300 my-1">
                                    <span><strong>ScriptWritter</strong>: {{ cr.scriptwriter }}</span>
                                    <span><strong>Director</strong>: {{ cr.director }}</span>
                                    <span><strong>Gender</strong>: {{ cr.gender }}</span>
                                    <span><strong>Social media handle</strong>: {{ cr.socialMediaHandle }}</span>
                                    <span><strong>Link to previous work</strong>: {{ cr.previousWork }}</span>
                                </li>
                            </ul>
                            <h6 v-else class="font-bold">No crew added yet</h6>
                        </div>
                        <div class="border my-2 p-1">
                            <div class="form-group">
                                <label for="scriptwriter" class="font-bold">Scriptwriter</label>
                                <input type="text" v-model="singleCrew.scriptwriter" name="scriptwriter" id="scriptwriter" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                            </div>
                    
                            <div class="form-group">
                                <label for="director" class="font-bold">Director</label>
                                <input type="text" v-model="singleCrew.director" name="director" id="director" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                            </div>
                    
                            <div class="form-group">
                                <label for="name" class="font-bold">Gender</label>
                                Male
                                <input type="radio" name="gender" id="gender">
                                Female
                                <input type="radio" name="gender" id="gender">
                            </div>

                            <div class="form-group">
                                <label for="name" class="font-bold">Social media handle</label>
                                <input type="text" v-model="singleCrew.socialMediaHandle" name="name" id="name" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                            </div>
                    
                            <div class="form-group">
                                <label for="name" class="font-bold">Links to previous works</label>
                                <textarea v-model="singleCrew.previousWork" id="synopsis"></textarea>
                            </div>
                            <StandardButton @click.prevent="addCrew" text="Add" class="mt-4"/>
                        </div>
                    </div>
                </div>
        
                <div class="my-4 text-center">
                    <LoadingComponent v-if="form.processing" class="border-2 border-primary"/>
                    <input type="submit" value="Save Project" v-else class="px-4 py-2 rounded-md bg-[var(--primary-color)] text-center text-white cursor-pointer">
                </div>
            </form>

    </div>
    </AdminDashboardLayout>
</template>

<style scoped>
/* Default styling is for mobile */
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

.form-container h1 {
    font-size: 25px;
    padding-top: 10px;
    font-family: 'Montserrat', sans-serif;
    font-weight: bold;
    color: var(--primary-color);
}

.form-container textarea {
    border-radius: 5px;
}


.form-group {
    margin-top: 20px;
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.form-group input {
    width: 100%;
    height: inherit;
    padding: 5px;
    border-radius: 5px;
    outline: none;
}

.form-group label {
    font-weight: bold;
}

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

@media only screen and (min-width: 1200px) {
    .content {
        padding-top: 10px;
    }
}
</style>
