<script setup>
import AdminDashboardLayout from "@/Layouts/AdminDashboardLayout.vue";
import StatsCard from "@/Components/StatsCard.vue";
</script>

<template>
    <AdminDashboardLayout>
        <div class="content">
                
        </div>
    </AdminDashboardLayout>
</template>

<style scoped>
/* Default styling is for mobile */

.content {
    margin-top: 20px;
    margin-bottom: 20px;
}

/* Scaling for desktop devices */

@media only screen and (min-width: 690px) {
    .content {
        display: flex;
        gap: 30px;
        justify-content: space-evenly;
    }
    .card {
        width: 100%;
    }
}

@media only screen and (min-width: 1200px) {
    .content {
        padding-top: 10px;
    }
}
</style>
