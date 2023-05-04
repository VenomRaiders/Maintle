<script setup>
import ScriptwritersAdmin from "@/Components/ScriptwritersAdmin.vue";
import AdminScriptsCard from "@/Components/AdminScriptsCard.vue";

const props = defineProps(["scripts"]);

</script>

<template>
    <ScriptwritersAdmin>
        <AdminScriptsCard v-for="script in scripts" :key="script.id" :script="script"/>
    </ScriptwritersAdmin>
</template>

<style>

</style>
