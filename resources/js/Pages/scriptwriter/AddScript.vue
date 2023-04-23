<script setup>
import { ref, reactive } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ScriptNavBar from '@/Components/ScriptNavBar.vue';
import StandardButton from '@/Components/StandardButton.vue';
import ErrorMessage from "@/Components/ErrorMessage.vue";
import LoadingComponent from "@/Components/LoadingComponent.vue";

const props = defineProps(['genres'])

const showLeadRoles = ref(false)

const singleLeadRole = reactive({
  "name": "",
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
  "scriptDocument": null,
  "mainGenre": "",
  "subGenre": "",
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
  <ScriptNavBar>

    <div class="">
        <h1 class="text-center text-2xl uppercase font-bold">Create a new script</h1>
        <form @submit.prevent="submitForm" class="mt-4">
          <div class="flex flex-col space-y-4 md:flex-row justify-between">
            <div class="w-full md:w-2/4 px-2 mb-2">
              <div class="form-group mb-2">
                <label for="title" class="font-bold text-2xl">Title</label> <br />
                <input type="text" v-model="form.title" class="w-full bg-[#7dd1b8] rounded-md text-white" name="" id="title">
                <ErrorMessage v-if="form.errors.title">{{ form.errors.title }}</ErrorMessage>
              </div>
              
              <div class="form-group mb-2">
                <label for="posterImage" class="font-bold text-2xl">Poster Image</label>
                <input type="file" name="" id="posterImage" @change="form.posterImage = $event.target.files[0]" class="w-full rounded-md text-black">
                <ErrorMessage v-if="form.errors.posterImage">{{ form.errors.posterImage }}</ErrorMessage>
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
                <label for="script" class="font-bold text-2xl">Script Document</label> <br />
                <input type="file" name="" id="scriptDocument" @change="form.scriptDocument = $event.target.files[0]" class="w-full rounded-md text-black">
                <ErrorMessage v-if="form.errors.scriptDocument">{{ form.errors.scriptDocument }}</ErrorMessage>
              </div>

              <div class="form-group">
                <label for="mainGenre" class="font-bold text-2xl">Main Genre</label> <br />
                <select v-model="form.mainGenre" name="mainGenre" id="mainGenre" multiple>
                  <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.genre }}</option>
                </select>
                <ErrorMessage v-if="form.errors.mainGenre">{{ form.errors.mainGenre }}</ErrorMessage>
              </div>

              <div class="form-group">
                <label for="subGenre" class="font-bold text-2xl">Sub Genre</label> <br />
                <select v-model="form.subGenre" name="subGenre" id="subGenre" multiple>
                  <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.genre }}</option>
                </select>
                <ErrorMessage v-if="form.errors.subGenre">{{ form.errors.subGenre }}</ErrorMessage>
              </div>

              <div class="form-group">
                <label for="castSize" class="font-bold text-2xl">Cast size</label> <br />
                <input type="number" v-model="form.castSize" placeholder="- select a value size -" class="w-full bg-white border-1 border-gray-400 rounded-md text-black" name="" id="castSize">
                <ErrorMessage v-if="form.errors.castSize">{{ form.errors.castSize }}</ErrorMessage>
              </div>

              <div class="form-group">
                <label for="location" class="font-bold text-2xl">Cast location</label> <br />
                <input type="number" v-model="form.location" placeholder="- select a value size -" class="w-full bg-white border-1 border-gray-400 rounded-md text-black" name="location" id="location">
                <ErrorMessage v-if="form.errors.location">{{ form.errors.location }}</ErrorMessage>
              </div>

            </div>
            <div class="w-full md:w-2/4">
              <div class="form-group mb-2">
                <div class="flex justify-between items-center">
                  <label for="copyright" class="font-bold text-2xl">Has copyright?</label>
                  <input type="checkbox" name="copyright" id="copyright">
                </div>
                <div class="">
                  <div class="form-group">
                    <label for="name">Name</label> <br />
                    <input type="text" v-model="singleCopyright.name" name="name" id="name" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                  </div>

                  <div class="form-group">
                    <label for="number">Number</label> <br />
                    <input type="number" v-model="singleCopyright.number" name="number" id="name" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                  </div>
                  <StandardButton @click.prevent="addCopyRight" text="add" class="mt-4"/>
                </div>
              </div>
              <StandardButton @click.prevent="showLeadRoles = !showLeadRoles" text="UPLOAD LEAD ROLES" />
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
                    <label for="name">Name</label> <br />
                    <input type="text" v-model="singleLeadRole.name" name="name" id="name" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                  </div>

                  <div class="form-group">
                    <label for="name">Social media handle</label> <br />
                    <input type="text" v-model="singleLeadRole.socialMediaHandle" name="name" id="name" class="w-full bg-white border-1 border-gray-400 rounded-md text-black">
                  </div>
                  <StandardButton @click.prevent="addLeadRole" text="add" class="mt-4"/>
                </div>
              </div>
            </div>
          </div>

          <div class="my-4">
            <LoadingComponent v-if="form.processing" class="border-2 border-primary"/>
            <input type="submit" value="Save" v-else class="px-4 py-2 rounded-md bg-primary text-black, font-bold text-center cursor-pointer">
          </div>
        </form>
    </div>

</ScriptNavBar>
</template>

<style>
</style>