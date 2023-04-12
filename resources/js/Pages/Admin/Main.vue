<script setup>
import AdminDashboardLayout from '@/Layouts/AdminDashboardLayout.vue';

</script>

<template>
    <AdminDashboardLayout>
        <div class="body-wrapper">
            <h1>Admin Dashboard</h1>
            <hr class="st">
        </div>
        
    </AdminDashboardLayout>
</template>

<style scoped>

.body-wrapper {
    padding-top: 10px;
}

.st {
    /* border-top: 3px solid linear-gradient(90deg, red); */
    height: 5px;
    background: linear-gradient(120deg, var(--primary-color), var(--alternate-color));
}
</style>