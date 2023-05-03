<script setup>
import AdminDashboardLayout from "@/Layouts/AdminDashboardLayout.vue";
import StatsCard from "@/Components/StatsCard.vue";
import StandardButton from "@/Components/StandardButton.vue";

const props = defineProps(["stats", "scripts_needing_approval"])

</script>

<template>
    <AdminDashboardLayout>
        <div class="content">
            <StatsCard
                card-title="Total Scripts"
                :stat-numbers="stats.total_scripts"
                icon="fa-solid fa-scroll"
            />
            <StatsCard
                card-title="Total Investors"
                :stat-numbers="stats.total_investors"
                icon="fa-solid fa-scroll"
            />
            <StatsCard
                card-title="Accounts Pending Approval"
                :stat-numbers="stats.scripts_pending_approval"
                icon="fa-solid fa-scroll"
            />
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
