<script setup>
import ScriptwriterDashboardLayout from '@/Layouts/ScriptwriterDashboardLayout.vue';
import ScriptsViewCard from "@/Components/ScriptsViewCard.vue";
</script>

<template>
    <ScriptwriterDashboardLayout>
        <div class="content">
            <ScriptsViewCard></ScriptsViewCard>
        </div>
    </ScriptwriterDashboardLayout>
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
