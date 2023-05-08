<script setup>
import { ref, reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ScriptWriterDashboardLayout from '@/Layouts/ScriptWriterDashboardLayout.vue';
import StandardButton from '@/Components/StandardButton.vue';
import ErrorMessage from "@/Components/ErrorMessage.vue";
import LoadingComponent from "@/Components/LoadingComponent.vue";

const props = defineProps(['genres'])

const showLeadRoles = ref(false)

const singleLeadRole = reactive({
  "realName": "",
  "characterName": "",
  "gender": "",
  "socialMediaHandle": ""
})

const leadRoles = reactive({values: []})

const hasCopyRight = ref(false)
const singleCopyright = reactive({
  "name": "",
  "number": ""
})
const copyright = reactive({values: []})

const form = useForm({
  "title": "",
  "posterImage": null,
  "logline": "",
  "synopsis": "",
  "motivation": "",
  "relevance": "",
  "origin": "",
  "scriptDocument": null,
  "contract_document": null,
  "mainGenre": [],
  "subGenre": [],
  "movieFormat": "",
  "castSize": "",
  "location": "",
  "leadRoles": leadRoles.values,
  "copyright": copyright.values,
  "movie_format": "",
  "target_audience": "",
  "motivation": "",
  "relevance": "",
  "story_origin": ""
})

function addLeadRole() {
  leadRoles.values.push({
    realName: singleLeadRole.realName,
    characterName: singleLeadRole.characterName,
    gender: singleLeadRole.gender,
    socialMediaHandle: singleLeadRole.socialMediaHandle
  })
  singleLeadRole.realName = ""
  singleLeadRole.characterName = ""
  singleLeadRole.gender = ""
  singleLeadRole.socialMediaHandle = ""
}

function removeLeadRole(leadrole) {
  let newLeadRoles = leadRoles.values.filter((role) => {
    return role.realName != leadrole.realName
  })
  leadRoles.values = newLeadRoles
}

function addCopyRight(){
  copyright.values.push({
    name: singleCopyright.name,
    number: singleCopyright.number
  })

  singleCopyright.name = ""
  singleCopyright.number = ""

  console.log(copyright)
}

function removeCopyRight(cr) {
  let newCopyright = copyright.values.filter((crr) => {
    return crr.name != crr.name
  })
  copyright.values = newCopyright
}

function submitForm(){
  form.post("/scriptwriter/add_script")
}

</script>

<template>
  <ScriptWriterDashboardLayout>

    <div class="form-container">
        <div class="text-left w-full">
          <StandardButton text="Go Back" bg-color="var(--primary-color)" :is-link=true :href="route('scriptwriter.dashboard')" style="width: fit-content;"></StandardButton>
        </div>
        <h1 v-if="$page.url == '/scriptwriter/first_script'" class="text-center text-2xl uppercase font-bold">Upload your first script for review</h1>
        <h1 v-else class="text-center text-2xl uppercase font-bold">New Script</h1>
        <form @submit.prevent="submitForm">
          <hr class="st">
            <div v-if="$page.url == '/scriptwriter/first_script'" class="form-inputs">
              <label for="contract_document">Signed Contract document. <span class="text-sm">Download Contract Document <a :href="route('contract_document')" target="_blank" class="text-blue-500 underline">EN</a> <a href="/contract_document?lang=fr" target="_blank" class="text-blue-500 underline">FR</a></span></label> 
              <input type="file" name="" id="contract_document" @change="form.contract_document = $event.target.files[0]" class="w-full rounded-md text-black">
              <ErrorMessage v-if="form.errors.contract_document">{{ form.errors.contract_document }}</ErrorMessage>
            </div>

            <div class="form-inputs">
              <label for="title">Title</label> 
              <input type="text" v-model="form.title"  name="" id="title">
              <ErrorMessage v-if="form.errors.title">{{ form.errors.title }}</ErrorMessage>
            </div>
            
            <div class="form-inputs">
              <label for="posterImage">Poster Image</label>
              <input type="file" name="" id="posterImage" @change="form.posterImage = $event.target.files[0]" class="w-full rounded-md text-black">
              <ErrorMessage v-if="form.errors.posterImage">{{ form.errors.posterImage }}</ErrorMessage>
            </div>

            <div class="form-inputs">
              <label for="logline">Logline</label> 
              <input type="text" v-model="form.logline"  name="" id="logline">
              <ErrorMessage v-if="form.errors.logline">{{ form.errors.logline }}</ErrorMessage>
            </div>

            <div class="form-inputs">
              <label for="synopsis">Synopsis</label> 
              <textarea name="" v-model="form.synopsis" id="synopsis" ></textarea>
              <ErrorMessage v-if="form.errors.synopsis">{{ form.errors.synopsis }}</ErrorMessage>
            </div>

            <div class="form-inputs">
              <label for="motivation">Motivation for the story</label> 
              <textarea name="" v-model="form.motivation" id="motivation" ></textarea>
              <ErrorMessage v-if="form.errors.motivation">{{ form.errors.motivation }}</ErrorMessage>
            </div>

            <div class="form-inputs">
              <label for="relevance">Relevance of the story</label> 
              <textarea name="" v-model="form.relevance" id="relevance" ></textarea>
              <ErrorMessage v-if="form.errors.relevance">{{ form.errors.relevance }}</ErrorMessage>
            </div>

            <div class="form-inputs mb-2">
              <label for="origin">Origin of the idea</label> 
              <textarea name="" v-model="form.story_origin" id="origin" ></textarea>
              <ErrorMessage v-if="form.errors.story_origin">{{ form.errors.story_origin }}</ErrorMessage>
            </div>

            <div class="form-inputs">
              <label for="script">Script Document</label> 
              <input type="file" name="" id="scriptDocument" @change="form.scriptDocument = $event.target.files[0]" class="w-full rounded-md text-black">
              <ErrorMessage v-if="form.errors.scriptDocument">{{ form.errors.scriptDocument }}</ErrorMessage>
            </div>

            <div class="form-inputs">
              <label for="mainGenre">Main Genre</label> 
              <select v-model="form.mainGenre" name="mainGenre" id="mainGenre" multiple>
                <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.genre }}</option>
              </select>
              <ErrorMessage v-if="form.errors.mainGenre">{{ form.errors.mainGenre }}</ErrorMessage>
            </div>

            <div class="form-inputs">
              <label for="subGenre">Sub Genre</label> 
              <select v-model="form.subGenre" name="subGenre" id="subGenre" multiple>
                <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.genre }}</option>
              </select>
              <ErrorMessage v-if="form.errors.subGenre">{{ form.errors.subGenre }}</ErrorMessage>
            </div>

            <div class="form-inputs">
              <label for="movieFormat">Movie Format</label> 
              <select v-model="form.movie_format" name="movie_format" id="movie_format" required>
                <option value="" selected disabled>- Select movie format -</option>
                <option value="Feature Movie">Feature Film</option>
                <option value="Short Film">Short Film</option>
                <option value="Documentary">Documentary</option>
                <option value="Series">Series</option>
              </select>
              <ErrorMessage v-if="form.errors.movie_format">{{ form.errors.movie_format }}</ErrorMessage>
            </div>

            <div class="form-groups">
              <div class="form-inputs">
                <label for="castSize">Cast size</label> 
                <input type="number" v-model="form.castSize" placeholder="- select a value size -" name="" id="castSize">
                <ErrorMessage v-if="form.errors.castSize">{{ form.errors.castSize }}</ErrorMessage>
              </div>
  
              <div class="form-inputs">
                <label for="location">Cast location</label> 
                <input type="number" v-model="form.location" placeholder="- select a value size -" name="location" id="location" required>
                <ErrorMessage v-if="form.errors.location">{{ form.errors.location }}</ErrorMessage>
              </div>
  
              <div class="form-inputs">
                <label for="targetAudience">Target Audience</label> 
                <select v-model="form.target_audience" name="target_audience" id="target_audience" required>
                  <option value="" selected disabled>- Select target audience -</option>
                  <option value="Children">Children</option>
                  <option value="Adolescent">Adolescent</option>
                  <option value="Adult">Adult</option>
                  <option value="Aged">Aged</option>
                </select>
                <ErrorMessage v-if="form.errors.target_audience">{{ form.errors.target_audience }}</ErrorMessage>
              </div>
            </div>
            <div class="form-inputs">
              <ErrorMessage v-if="form.errors.copyright">{{ form.errors.copyright }}</ErrorMessage>
              <div class="form-groups fix-radio">
                <label for="copyright">Has copyright?</label>
                <input type="checkbox" name="copyright" id="copyright" :value=hasCopyRight v-model="hasCopyRight">
              </div>
              <div v-if="hasCopyRight" class="">
                <div class="my-2 p-1 border">
                  <ul v-if="copyright.values.length != 0" class="h-48 overflow-y-scroll cursor-pointer">
                    <li v-for="cp in copyright.values" :key="cp" @click.prevent="removeCopyRight(cp)" class="text-sm bg-slate-300 my-1">
                      <span><strong>Name</strong>: {{ cp.name }}</span> 
                      <span><strong>Number</strong>: {{ cp.number }}</span>
                    </li>
                  </ul>
                  <h6 v-else>No copyright</h6>
                </div>
                <div class="form-inputs">
                  <label for="name">Name</label> 
                  <input type="text" v-model="singleCopyright.name" name="name" id="name">
                </div>

                <div class="form-inputs">
                  <label for="number">Number</label> 
                  <input type="text" v-model="singleCopyright.number" name="number" id="name">
                </div>
                <StandardButton @click.prevent="addCopyRight" text="add" class="mt-4"/>
              </div>
            </div>

            <div class="form-groups" style="margin-top: 20px;">
              <StandardButton @click.prevent="showLeadRoles = !showLeadRoles" text="Add Lead Roles"/>
              <ErrorMessage v-if="form.errors.leadRoles">{{ form.errors.leadRoles }}</ErrorMessage>
            </div>
            <div v-if="showLeadRoles">
              <div class="my-2 p-1 border">
                <ul v-if="leadRoles.values.length != 0" class="h-48 overflow-y-scroll cursor-pointer">
                  <li v-for="leadrole in leadRoles.values" :key="leadrole" @click.prevent="removeLeadRole(leadrole)" class="text-sm bg-slate-300 my-1">
                    <span><strong>Real Name</strong>: {{ leadrole.realName }}</span> 
                    <span><strong>Character Name</strong>: {{ leadrole.characterName }}</span> 
                    <span><strong>Gender</strong>: {{ leadrole.gender }}</span> 
                    <span><strong>Social Handle</strong>: {{ leadrole.socialMediaHandle }}</span>
                  </li>
                </ul>
                <h6 v-else>No lead roles added yet</h6>
              </div>
              <div class="border my-2 p-1">
                <div class="form-inputs">
                  <label for="realName">Real Name</label> 
                  <input type="text" v-model="singleLeadRole.realName" name="realName" id="realName">
                </div>

                <div class="form-inputs">
                  <label for="characterName">Character Name</label> 
                  <input type="text" v-model="singleLeadRole.characterName" name="characterName" id="characterName">
                </div>

                <div class="form-groups" style="margin-top: 20px;">
                  <label>Gender</label> 
                  Male
                  <input type="radio" name="male" id="maleGender" value="male" v-model="singleLeadRole.gender">
                  Female
                  <input type="radio" name="female" id="femaleGender" value="female" v-model="singleLeadRole.gender">
                </div>

                <div class="form-inputs">
                  <label for="name">Social media handle</label> 
                  <input type="text" v-model="singleLeadRole.socialMediaHandle" name="name" id="name">
                </div>
                <StandardButton @click.prevent="addLeadRole" text="add" class="mt-4"/>
              </div>
              </div>
          <div class="my-8 flex justify-center submit">
            <LoadingComponent v-if="form.processing" class="border-2 border-primary"/>
            <input type="submit" value="Save" v-else class="px-4 py-2 rounded-md bg-[var(--primary-color)] text-white text-center cursor-pointer">
          </div>
        </form>
    </div>

</ScriptWriterDashboardLayout>
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

.submit input:hover {
  background-color: var(--secondary-color);
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

.form-inputs input, .form-inputs select {
  width: 100%;
  height: inherit;
  padding: 2px;
  border-radius: 5px;
}

.form-inputs select {
  padding: 3px;
}

.form-inputs label {
  font-weight: bold;
}

.form-inputs input[type=file] {
  border: none;
}


.form-groups {
  margin-top: 10px;
  display: flex;
  align-items: center;
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

/* responsive for desktop sizes */

@media only screen and (min-width: 1100px) {
  .form-container {
    width: 800px;
    margin-left: auto;
    margin-right: auto;
  }

  .form-container label {
    font-size: 17px;
  }

  form {
    width: 100%;
    align-items: center;
  }

  .submit {
    justify-content: flex-end;
  }
}
</style>