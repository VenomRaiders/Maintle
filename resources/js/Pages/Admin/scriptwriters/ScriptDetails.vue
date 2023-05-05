<script setup>
import AdminDashboardLayout from "@/Layouts/AdminDashboardLayout.vue";
import ScriptsViewCard from '@/Components/ScriptsViewCard.vue';

const props = defineProps(['script','admin_contact'])

</script>

<template>
    <AdminDashboardLayout>
        <ScriptsViewCard :script="script" :isAllowed="true" class="mt-2"></ScriptsViewCard>
    </AdminDashboardLayout>
</template>

<style>

</style>
