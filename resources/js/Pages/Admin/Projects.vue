<script setup>
import AdminDashboardLayout from "@/Layouts/AdminDashboardLayout.vue";
import StandardButton from '@/Components/StandardButton.vue';
import AdminProjectsCard from "@/Components/AdminProjectsCard.vue";
</script>

<template>
    <AdminDashboardLayout>
        <StandardButton text="New Project" :isLink=true :href="route('admin.add_project')" />
        <div class="content">
            <!-- This text below is used when there are no projects -->
            <!-- No projects available -->

            <!-- Component for all the project cards -->
            <AdminProjectsCard></AdminProjectsCard>
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
