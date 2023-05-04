<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import StandardButton from "./StandardButton.vue";
import Tags from "./Tags.vue";

const toggleContribution = ref(false);

const props = defineProps({'project': Object, 'isAdmin': false});

const contributionForm = useForm({
    project_id: props.project.id,
    amount: null,
});

const addContribution = () => {
    contributionForm.put(route('admin.project.add_contribution'));
    contributionForm.amount = null
    toggleContribution.value = false
}

const markAsSoldFom = useForm({
    project_id: props.project.id,
});

const markAsSold = () => {
    markAsSoldFom.put(route('admin.project.mark_as_sold'));
}

</script>

<template>
    <div class="card">
        <div class="col-1">
            <img :src="'/storage/'+project.image" alt="project image" />
        </div>
        <div class="col-2">
            <div class="card-body">
                <h1>{{ project.title }}</h1>
                <Tags v-for="genre in project.genres" :key="genre.id" :text="genre.genre"/>
                <p>Project Cost: <span>{{ project.amount }}$</span></p>
                <p>Amount Contributed: <span>{{ project.contribution }}$</span></p>
                <p>Amount left: <span>{{ project.amount - project.contribution}}$</span></p>
            </div>
            <div v-if="isAdmin" class="card-buttons">
                <StandardButton @click="markAsSold" v-if="!project.is_funded" class="no-outline" text="Mark as Sold"/>
                <StandardButton text="Add Contribution" @click="toggleContribution = !toggleContribution" v-if="!project.is_funded" class="no-outline"/>
                <div v-if="toggleContribution" class="add-contribution">
                    <label>Add New Contribution</label>
                    <input type="number" v-model="contributionForm.amount">
                    <div class="buttons">
                        <StandardButton text="Cancel" @click="toggleContribution = !toggleContribution" class="no-outline"/>
                        <StandardButton text="Add" @click="addContribution"/>
                    </div>
                </div>
                <StandardButton text="View" :is-link=true :href="route('admin.project.view', id=project.id)"/>
            </div>
            <div v-else class="card-button">
                <StandardButton text="View" :is-link=true :href="route('project_details', id=project.id)"/>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* default mobile styling */

.no-outline {
    background-color: transparent;
    color: black;
    border: 1px solid var(--border-color)
}

.no-outline:hover {
    background-color: var(--alternate-color);
    color: var(--text-color);
}
.card {
    display: flex;
    height: 200px;
    border: 1px solid var(--border-color);
    overflow: hidden;
    background-color: white;
    border-radius: 5px;
}

.card h1 {
    font-weight: bold;
    font-family: 'Montserrat Alternates', sans-serif;
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
    width: auto;
}

.card-body span {
    color: blue;
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

.add-contribution {
    width: 70%;
    position: absolute;
    margin-top: -120px;
    margin-left: 50px;
    padding: 10px;
    border-radius: 10px;
    background-color: var(--alternate-background-color);
}

.add-contribution label {
    font-weight: bold;
}

.add-contribution input {
    height: 25px;
    width: 100%;
    border-radius: 5px;
}

.add-contribution .buttons {
    display: flex;
    padding-top: 10px;
    justify-content: flex-end;
}

.tag-text {
    font-size: 15px;
}

/* Scaling for desktop versions */

/* overide the default growth size on this screen size */
@media only screen and (min-width: 535px) {
  .tag-text {
      font-size: 13px;
    }
}


@media only screen and (min-width: 900px) {
  .card {
    display: flex;
    flex-direction: column;
    height: auto;
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
