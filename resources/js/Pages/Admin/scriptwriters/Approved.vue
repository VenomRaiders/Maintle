<script setup>
import ScriptwritersAdmin from "@/Components/ScriptwritersAdmin.vue";
import AdminScriptsCard from "@/Components/AdminScriptsCard.vue";

const props = defineProps(["approved_scripts"]);

</script>

<template>
<ScriptwritersAdmin>
    <AdminScriptsCard v-for="script in approved_scripts" :key="script.id" :script="script"/>
</ScriptwritersAdmin>
</template>