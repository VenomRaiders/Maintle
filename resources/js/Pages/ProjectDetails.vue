<script setup>
import HomePageLayoutVue from "@/Layouts/HomePageLayout.vue";
import HomeScriptsView from "@/Components/HomeScriptsView.vue";

const props = defineProps(['project','admin_contact'])

</script>

<template>
    <HomePageLayoutVue :tab-header="project.title">
        <div class="content">
            <HomeScriptsView :project="project" :admin_contact="admin_contact"></HomeScriptsView>
        </div>
    </HomePageLayoutVue>
</template>

<style scoped>
/* Default styling is for mobile */

.content {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    margin-bottom: 20px;
}

.btn {
    width: fit-content;
    margin-top: 15px;
}

/* Scaling for desktop devices */

@media only screen and (min-width: 690px) {
    .card {
        width: 100%;
    }
}

@media only screen and (min-width: 1200px) {
    .content {
        padding-top: 30px;
    }
}
</style>