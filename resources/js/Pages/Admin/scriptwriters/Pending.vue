<script setup>
import ScriptwritersAdmin from "@/Components/ScriptwritersAdmin.vue";
import AdminScriptsCard from "@/Components/AdminScriptsCard.vue";

const props = defineProps(["scripts_needing_approval"]);
</script>

<template>
<ScriptwritersAdmin>
    <h4 class="text-center text-2xl font-bold">First scripts uploaded by script writters needing approval</h4>
    <AdminScriptsCard v-for="script in scripts_needing_approval" :key="script.id" :script="script" :showApprove="true" :showReject="true"/>
</ScriptwritersAdmin>
</template>