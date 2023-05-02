<script setup>
import { Head, router } from "@inertiajs/vue3";
import HomePageLayoutVue from "@/Layouts/HomePageLayout.vue";
import StandardButton from '@/Components/StandardButton.vue';
import ScriptAndProjectCard from "@/Components/ScriptAndProjectCard.vue";

const props = defineProps(['projects'])

function buyScript(id){
    router.post('/scripts/buy', {script_id: id})
}

</script>

<template>
    <Head title="Scripts" />

    <HomePageLayoutVue tab-header="Projects Gallery">
        <div class="scripts-container">
            <h1 v-if="projects.length === 0" class="log">No Recent Projects</h1>
            <ScriptAndProjectCard v-for="project in projects" :key="script.id"
            :genres="project.genres"
            :stitle="project.script_title"
            :body="project.script_synopsis"
            :poster-image="project.poster_image"
            >
                <template #buttons>
                    <StandardButton text="View" :is-link=true :href="route('script_details', project.id)"/>
                    <StandardButton text="Buy" @click.prevent="buyScript(project.id)" />
                </template>
            </ScriptAndProjectCard>
        </div>
    </HomePageLayoutVue>

    
</template>

<style scoped>

/* Mobile first styling */
.scripts-container {
    padding: 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
}

.card-buttons .btn {
    font-size: 13px;
    height: 35px;
    margin-left: 10px;
}
</style>