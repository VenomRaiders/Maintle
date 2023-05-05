<script setup>
import { ref, computed } from "vue";
import StandardButton from '@/Components/StandardButton.vue';
import Tags from '@/Components/Tags.vue';

const props = defineProps(['project', 'admin_contact']);

const user = computed(() => usePage().props.auth.user)
const role = computed(() => usePage().props.auth.role)

const toggleMessage = ref(false)

const message = ref('')

const whatsappUrl = ref('https://api.whatsapp.com/send?phone='+props.admin_contact+'&text=')

function sendMessage(){
    let link = whatsappUrl.value + encodeURIComponent(message.value)
    window.open(link, '_blank')
}

</script>

<template>
    <div class="view-container">
        <div class="col-1">
            <img :src="'/storage/'+project.image" alt="prject image" />
        </div>
        <div class="col-2">
            <div class="card-body">
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
            <div class="card-buttons">
                <StandardButton v-if="!user || role != 'admin'" text="contact admin" @click="toggleMessage = !toggleMessage"/>
                <div v-if="toggleMessage" class="delete-confirm">
                    <textarea v-model="message" placeholder="Write message to admin"></textarea>
                    <div class="buttons">
                        <StandardButton text="Cancel" @click="toggleMessage = !toggleMessage"/>
                        <StandardButton @click="sendMessage"  text="Send message"/>
                    </div>
                </div>
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