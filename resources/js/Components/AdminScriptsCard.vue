<script setup>
import { useForm } from "@inertiajs/vue3";
import StandardButton from "./StandardButton.vue";
import Tags from "./Tags.vue";

const props = defineProps({
    script: Object,
    showApprove: false,
    showReject: false,
    isRejected: false
});

const scriptForm = useForm({
    script_id: props.script.id,
});

function approveScript() {
    scriptForm.post(route("admin.approve_script"));
}

function rejectScript(){
    scriptForm.post(route("admin.reject_script"));
}

function reApprove(){
    scriptForm.post(route("admin.re_approve_script"));
}
</script>

<template>
    <div class="card">
        <div class="col-1">
            <img :src="'/storage/'+script.poster_image" alt="script image" />
        </div>
        <div class="col-2">
            <div class="card-body">
                <h1>{{ script.script_title }}</h1>
                <Tags v-for="genre in script.genres" :key="genre" :text="genre.genre" />
                <p>
                    {{script.motivation}}
                </p>
            </div>
            <div class="card-buttons">
                <StandardButton text="Approve" v-if="showApprove" @click="approveScript"/>
                <StandardButton text="View" :is-link=true :href="route('admin.script.view', script.id)"/>
                <StandardButton class="reject" text="Reject" v-if="showReject" @click="rejectScript"/>
                <StandardButton text="ReApprove" v-if="isRejected" @click="reApprove"/>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* default mobile styling */
.reject {
    background-color: transparent;
    color: black;
    border: 1px solid var(--border-color)
}

.reject:hover {
    background-color: var(--danger-color);
    color: var(--text-color);
}

.card {
    display: flex;
    height: 150px;
    border: 1px solid var(--border-color);
    overflow: hidden;
    background-color: white;
    border-radius: 5px;
    width: 100%;
}

.card h1 {
    font-weight: bold;
}

.col-1 {
    min-width: 30%;
    width: 40%;
}

.col-1 img {
    width: 100%;
    background-size: contain;
    height: 100%;
}

.col-2 {
    width: 100%;
    position: relative;
}

.card-body {
    padding: 7px 12px;
}

.card-body p {
    margin-top: 5px;
    font-size: 14px;
    width: 300px;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}

.card-buttons {
    width: 100%;
    padding: 9px 12px;
    position: absolute;
    bottom: 0;
    display: flex;
    justify-content: flex-end;
}

.card-buttons .btn {
    font-size: 13px;
    height: 35px;
    margin-right: 10px;
}

.tag-text {
    font-size: 13px;
}

/* Scaling for desktop versions */
/* overide the default growth size on this screen size */
@media only screen and (min-width: 535px) {
    .tag-text {
        font-size: 13px;
    }
}

@media only screen and (min-width: 785px) {
    .card {
        flex-direction: column;
        height: 430px;
        max-width: 350px;
    }

    .col-1 {
        all: unset;
    }

    .card img {
        height: 300px;
    }

    .card-buttons {
        all: unset;
        display: flex;
        padding: 10px;
    }

}
</style>