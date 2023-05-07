<script setup>
import ScriptwritersAdmin from "@/Components/ScriptwritersAdmin.vue";
import AdminScriptsCard from "@/Components/AdminScriptsCard.vue";

const props = defineProps(["approved_scripts"]);

</script>

<template>
<ScriptwritersAdmin>
    <div class="scripts-container">
        <AdminScriptsCard v-for="script in approved_scripts" :key="script.id" :script="script"/>
    </div>
</ScriptwritersAdmin>
</template>