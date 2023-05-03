<script setup>
import ScriptwritersAdmin from "@/Components/ScriptwritersAdmin.vue";
</script>

<template>
<ScriptwritersAdmin>
    <div class="table-container">
        <h1 class="text-center">Pending Scripts: Needing Approval</h1>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="font-bold px-6 py-3">#</th>
                        <th class="font-bold px-6 py-3">Script Title</th>
                        <th class="font-bold px-6 py-3">LogLine</th>
                        <th class="font-bold px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(script, index) in scripts_needing_approval" :key="script.id" class="bg-white border-b">
                        <td class="px-6 py-4">{{ index }}</td>
                        <td class="px-6 py-4">{{ script.script_title }}</td>
                        <td class="px-6 py-4">{{ script.script_log_line }}</td>
                        <td class="px-6 py-4">
                            <StandardButton text="View"/>
                            <StandardButton text="Approve"/>
                            <StandardButton text="Reject"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</ScriptwritersAdmin>
</template>

<style scoped>
.table-container h1 {
    font-family: 'Montserrat Alternates';
    font-weight: bold;
    margin-bottom: 20px;
}
</style>