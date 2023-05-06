<script setup>
import { ref } from "vue";
import StandardButton from '@/Components/StandardButton.vue';
import Tags from '@/Components/Tags.vue';

defineProps({'script': Object, isAllowed:false })

const toggleDelete = ref(false);
</script>

<template>
    <div class="view-container">
        <div class="col-1">
            <img :src="'/storage/'+script.poster_image" alt="script image" />
        </div>
        <div class="col-2">
            <div class="card-body">
                <div class="item">
                    <h1>Title</h1>
                    <p>{{ script.script_title }}</p>
                </div>
                <div class="item">
                    <h1>Logline</h1>
                    <p>{{ script.script_logline }}</p>
                </div>
                <div class="item">
                    <h1>Synopsis</h1>
                    <p>{{ script.script_synopsis }}</p>
                </div>
                <div class="item">
                    <h1>Motivation for the story</h1>
                    <p>{{ script.motivation }}</p>
                </div>
                <div class="item">
                    <h1>Relevance of the story</h1>
                    <p>{{ script.relevance }}</p>
                </div>

                <div class="item">
                    <h1>Origin of the idea</h1>
                    <p>{{ script.story_origin }}</p>
                </div>
                <div v-if="isAllowed" class="item" >
                    <h1>Script Document</h1>
                    <a :href="route('download_script_document', script.id)" target="_blank" class="bg-[var(--primary-color)] text-white p-2 my-2 rounded-md" style="margin-top: 40px;">Download File</a>
                </div>
                <div class="item">
                    <h1>Genres</h1>
                    <Tags v-for="genre in script.genres" :key="genre.id" :text="genre.genre"></Tags>
                </div>
                <div class="item">
                    <h1>Sub Genres</h1>
                    <Tags v-for="genre in script.sub_genres" :key="genre.id" :text="genre.genre"></Tags>
                </div>
                <div class="item">
                    <h1>Cast Size</h1>
                    <p><span>{{ script.script_cast_size }}</span></p>
                </div>
                <div class="item">
                    <h1>Cast Location</h1>
                    <p><span>{{ script.script_no_locations }}</span></p>
                </div>
                <div class="item">
                    <h1>Target Audience</h1>
                    <p><span>{{ script.target_audience }}</span></p>
                </div>
                <div class="item">
                    <!-- if any -->
                    <h1>Copyright</h1>
                    <p><span v-for="copyright in JSON.parse(script.copyright)" :key="copyright">[{{ copyright.name}}]: [{{ copyright.number }}]</span></p>
                </div>
                <div class="item">
                    <h1>Lead Roles</h1>
                    <div v-for="leadRole in JSON.parse(script.script_lead_roles)" :key="leadRole.realName" class="nested-item">
                        <p>Real Name<br><span>{{ leadRole.realName }}</span></p>
                        <p>Character Name<br><span>{{  leadRole.characterName }}</span></p>
                        <p>Gender<br><span>{{ leadRole.gender }}</span></p>
                        <p>Social Media Handle<br><span>{{ leadRole.socialMediaHandle }}</span></p>
                    </div>
                </div>
            </div>
            <div v-if="$page.url.startsWith('/scripts')">
                <slot />
            </div>
        </div>
    </div>
</template>

<style scoped>
.view-container {
    position: relative;
    background-color: white;
    border: 1px solid var(--border-color);
    border-radius: 20px;
    width: 400px;
    transition: 0.4s;
}

.col-1 {
    height: 400px;
}

.col-1 img {
    width: 100%;
    height: inherit;
}

.col-2 {
    padding: 20px;
}

.item {
    margin-bottom: 15px;
}

.item h1 {
    font-size: 18px;
    font-weight: bold;
    font-family: 'Montserrat', sans-serif;
}

.item span {
    color: blue;
}

.nested-item {
    font-weight: bold;
    border: 1px solid var(--border-color);
    padding: 10px;
    border-radius: 20px;
}

.nested-item span {
    font-weight: normal;
}

.card-buttons {
    padding-top: 20px;
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}


.no-outline,
.delete {
    background-color: transparent;
    color: black;
    border: 1px solid var(--border-color)
}

.delete {
    background-color: var(--danger-color);
    color: var(--text-color);
    border: 1px solid var(--border-color)
}

.delete:hover {
    background-color: rgba(255, 0, 0, 0.541);
    color: var(--text-color);
}

.no-outline:hover {
    background-color: var(--danger-color);
    color: var(--text-color);
}


.delete-confirm {
    position: absolute;
    border-radius: 20px;
    padding: 20px;
    background-color: var(--alternate-background-color);
    margin-top: -120px;
}

.delete-confirm .buttons {
    display: flex;
    gap: 10px;
    padding-top: 5px;
    justify-content: flex-end;
}

/* Scaling for desktop screens */

@media only screen and (min-width: 875px) {
    .view-container {
        width: 600px;
    }
}
</style>