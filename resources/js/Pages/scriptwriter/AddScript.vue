<script setup>
import { ref, reactive } from 'vue';
import ScriptNavBar from '@/Components/ScriptNavBar.vue';
import StandardButton from '@/Components/StandardButton.vue';

function testEvent() {
  console.log("clicked")
}

const showLeadRoles = ref(false)
const singleLeadRole = reactive({
  "name": "",
  "socialMediaHandle": ""
})

const form = reactive({
  "title": "",
  "logline": "",
  "synopsis": "",
  "type": "",
  "mainGenre": "",
  "subGenre": "",
  "castSize": "",
  "location": "",
  "leadRoles": []
})

const leadRoles = reactive({values: []})

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
  form.leadRoles.value = leadRoles.value // adds to lead role to the form data
  console.log("Submiting")
}

</script>

<template>
  <ScriptNavBar>

    <div class="">
        <h1 class="text-center text-2xl uppercase font-bold">Create a new script</h1>
        <form @submit.prevent="submitForm" class="mt-4">
          <div class="flex flex-col space-y-4 md:flex-row justify-between">
            <div class="w-full md:w-3/5 px-2 mb-2">
              <div class="form-group mb-2">
                <label for="title" class="font-bold text-2xl">Title</label> <br />
                <input type="text" v-model="form.title" class="w-full bg-[#7dd1b8] rounded-md text-white" name="" id="title">
              </div>
              
              <div class="form-group mb-2">
                <label for="posterImage" class="font-bold text-2xl">Poster Image</label>
                <input type="file" name="" id="posterImage" class="w-full rounded-md text-black">
              </div>

              <div class="form-group mb-2">
                <label for="logline" class="font-bold text-2xl">Logline</label> <br />
                <input type="text" v-model="form.logline" class="w-full bg-[#7dd1b8] rounded-md text-white" name="" id="logline">
              </div>

              <div class="form-group mb-2">
                <label for="synopsis" class="font-bold text-2xl">Synopsis</label> <br />
                <textarea name="" v-model="form.synopsis" id="synopsis" class="w-full bg-[#7dd1b8] rounded-md text-white"></textarea>
              </div>

              <div class="form-group">
                <label for="script" class="font-bold text-2xl">Type/Format</label> <br />
                <select v-model="form.type" name="script" id="script">
                  <option value="feature">Feature</option>
                  <option value="tv">TV</option>
                  <option value="web">Web</option>
                </select>
              </div>

              <div class="form-group">
                <label for="mainGenre" class="font-bold text-2xl">Main Genre</label> <br />
                <select v-model="form.mainGenre" name="mainGenre" id="mainGenre">
                  <option value="feature">Feature</option>
                </select>
              </div>

              <div class="form-group">
                <label for="subGenre" class="font-bold text-2xl">Sub Genre</label> <br />
                <select v-model="form.subGenre" name="subGenre" id="subGenre">
                  <option value="feature">Feature</option>
                </select>
              </div>

              <div class="form-group">
                <label for="castSize" class="font-bold text-2xl">Cast size</label> <br />
                <input type="number" v-model="form.castSize" placeholder="- select a value size -" class="w-full bg-white border-1 border-gray-400 rounded-md text-black" name="" id="castSize">
              </div>

              <div class="form-group">
                <label for="location" class="font-bold text-2xl">Cast size</label> <br />
                <input type="number" v-model="form.location" placeholder="- select a value size -" class="w-full bg-white border-1 border-gray-400 rounded-md text-black" name="location" id="location">
              </div>

            </div>
            <div class="w-full md:w-1/5">
              <StandardButton @click.prevent="showLeadRoles = !showLeadRoles" text="UPLOAD LEAD ROLES" />
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
            <input type="submit" value="Save" class="px-4 py-2 rounded-md bg-primary text-black, font-bold text-center cursor-pointer">
          </div>
        </form>
    </div>

  </ScriptNavBar>
</template>