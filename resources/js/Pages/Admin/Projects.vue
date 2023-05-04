<script setup>
import AdminDashboardLayout from "@/Layouts/AdminDashboardLayout.vue";
import StandardButton from '@/Components/StandardButton.vue';
import AdminProjectsCard from "@/Components/AdminProjectsCard.vue";

const props = defineProps(['projects'])
</script>

<template>
    <AdminDashboardLayout>
        <StandardButton text="New Project" :isLink=true :href="route('admin.add_project')" />
        <div class="content">
            <h1 v-if="projects.length < 1" class="font-bold text-4xl">No projects available</h1>

            <AdminProjectsCard v-for="project in projects" :key="project.id" :project="project" :isAdmin="true"/>
        </div>
    </AdminDashboardLayout>
</template>

<style scoped>
/* Default styling is for mobile */

.content {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    margin-top: 20px;
    margin-bottom: 20px;
}

.btn {
    width: fit-content;
    margin-top: 15px;
}

/* Scaling for desktop devices */

@media only screen and (min-width: 690px) {
    .content {
        justify-content: center;
    }
    .card {
        width: 100%;
    }
}

@media only screen and (min-width: 1200px) {
    .content {
        padding-top: 30px;
        gap: 50px;
    }
}
</style>
