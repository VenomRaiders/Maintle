<script setup>
import { Head, router } from "@inertiajs/vue3";
import HomePageLayoutVue from "@/Layouts/HomePageLayout.vue";

</script>

<template>
    <Head title="Scripts" />

    <HomePageLayoutVue tab-header="">
        <div class="scripts-container">
            <h1>Coming Soon...😉</h1>
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
    line-height: 30px;
}


h1 {
    font-family: "Montserrat", sans-serif;
    font-size: 35px;
    font-weight: bold;
    padding-bottom: 10px;
}
</style>
