<script setup>
import ScriptwritersAdmin from "@/Components/ScriptwritersAdmin.vue";
import AdminScriptsCard from "@/Components/AdminScriptsCard.vue";

const props = defineProps(["rejected_scripts"]);
</script>

<template>
<ScriptwritersAdmin>
    <h4 class="text-center text-2xl font-bold">Rejected Scripts</h4>
    <div class="scripts-container">
        <AdminScriptsCard v-for="script in rejected_scripts" :key="script.id" :script="script" :isRejected="true"/>G
    </div>
</ScriptwritersAdmin>
</template>