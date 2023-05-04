<script setup>
import { Head, router } from "@inertiajs/vue3";
import HomePageLayoutVue from "@/Layouts/HomePageLayout.vue";
import AdminProjectsCard from "@/Components/AdminProjectsCard.vue";

const props = defineProps(['project'])

function buyScript(id){
    // router.post('/scripts/buy', {script_id: id})
}

</script>

<template>
    <HomePageLayoutVue :tab-header="project.title">

    <div class="view-container">
        <div class="col-1">
            <img :src="'/storage/'+project.image" alt="project image"  class="h-96"/>
        </div>
        <div class="col-2">
            <div class="">
                <div class="item">
                    <h1>Title</h1>
                    <p>{{ project.title }}</p>
                </div>
                <div class="item">
                    <h1>Logline</h1>
                    <p>{{ project.logline }}</p>
                </div>
                <div class="item">
                    <h1>Genre</h1>
                    <Tags v-for="genre in project.genres" :key="genre.id" :text="genre.genre"/>
                </div>
                <div class="item">
                    <h1>Project Cost</h1>
                    <p><span>{{ project.amount }}$</span></p>
                </div>
                <div class="item">
                    <h1>Synopsis</h1>
                    <p>{{ project.synopsis }}</p>
                </div>
                <div class="item">
                    <h1>Amount Contributed</h1>
                    <p><span>{{ project.contribution }}$</span></p>
                </div>
                <div class="item">
                    <h1>Amount Left</h1>
                    <p><span>{{ project.amount - project.contribution }}$</span></p>
                </div>
                <div class="item">
                    <h1>Lead Cast</h1>
                    <div v-for="leadCast in JSON.parse(project.lead_cast)" class="nested-item">
                        <p>Name<br><span>{{ leadCast.name }}</span></p>
                        <p>Handle<br><span>{{ leadCast.socialMediaHandle }}</span></p>
                    </div>
                </div>
                <div class="item">
                    <h1>Crew</h1>
                    <div v-for="crew in JSON.parse(project.crew)" class="nested-item">
                        <p>ScriptWritter<br><span>{{ crew.scriptwriter }}</span></p>
                        <p>Director<br><span>{{ crew.director }}</span></p>
                        <p>Gender<br><span>{{ crew.gender }}</span></p>
                        <p>Social Media Handle<br><span>{{ crew.socialMediaHandle }}</span></p>
                        <p>Links to previous work<br><span>[{{ crew.previousWork }}]</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </HomePageLayoutVue>
</template>

<style scoped>

</style>