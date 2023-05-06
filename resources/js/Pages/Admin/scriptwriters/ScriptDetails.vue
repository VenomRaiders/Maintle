<script setup>
import AdminDashboardLayout from "@/Layouts/AdminDashboardLayout.vue";
import ScriptsViewCard from '@/Components/ScriptsViewCard.vue';

const props = defineProps(['script','admin_contact'])

</script>

<template>
    <AdminDashboardLayout>
        <div class="content">
            <ScriptsViewCard :script="script" :isAllowed="true" class="mt-2"></ScriptsViewCard>
        </div>
    </AdminDashboardLayout>
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

