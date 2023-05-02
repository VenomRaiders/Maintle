<script setup>
import { Head, router } from "@inertiajs/vue3";
import HomePageLayoutVue from "@/Layouts/HomePageLayout.vue";
import StandardButton from '@/Components/StandardButton.vue';
import ScriptAndProjectCard from "@/Components/ScriptAndProjectCard.vue";

const props = defineProps(['scripts'])

function buyScript(id){
    router.post('/scripts/buy', {script_id: id})
}

</script>

<template>
    <Head title="Scripts" />

    <HomePageLayoutVue tab-header="Scripts Gallery">
        <div class="scripts-container">
            <h1 v-if="scripts.length === 0" class="log">No Recent Scripts</h1>
            <ScriptAndProjectCard v-for="script in scripts" :key="script.id"
            :genres="script.genres"
            :stitle="script.script_title"
            :body="script.script_synopsis"
            :poster-image="script.poster_image"
            >
                <template #buttons>
                    <StandardButton text="View" :is-link=true :href="route('script_details', script.id)"/>
                    <StandardButton text="Buy" @click.prevent="buyScript(script.id)" />
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