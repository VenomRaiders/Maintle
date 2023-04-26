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
                stat-percentage="3.14"
                icon="fa-solid fa-scroll"
            />
            <StatsCard
                card-title="Total Investors"
                :stat-numbers="stats.total_investors"
                stat-percentage="3.14"
                icon="fa-solid fa-scroll"
            />
            <StatsCard
                card-title="Accounts Pending Approval"
                :stat-numbers="stats.scripts_pending_approval"
                stat-percentage="3.14"
                icon="fa-solid fa-scroll"
            />
        </div>

        <div class="">
            <h1 class="text-center text-2xl font-bold">First uploaded scripts needing approval</h1>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th class="font-bold px-6 py-3">#</th>
                            <th class="font-bold px-6 py-3">Script Title</th>
                            <th class="font-bold px-6 py-3">Synopsis</th>
                            <th class="font-bold px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(script ,index) in scripts_needing_approval" :key="script.id" class="bg-white border-b">
                            <td class="px-6 py-4">{{ index }}</td>
                            <td class="px-6 py-4">{{ script.script_title }}</td>
                            <td class="px-6 py-4">{{ script.script_synopsis }}</td>
                            <td class="px-6 py-4">
                                <StandardButton text="View"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
