<script setup>
import ScriptwritersAdmin from "@/Components/ScriptwritersAdmin.vue";
import StandardButton from "@/Components/StandardButton.vue";

const props = defineProps(["scripts_needing_approval"]);
</script>

<template>
<ScriptwritersAdmin>
    <h4 class="text-center text-2xl font-bold">First scripts uploaded by script writters needing approval</h4>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="font-bold px-6 py-3">#</th>
                    <th class="font-bold px-6 py-3">Script Title</th>
                    <th class="font-bold px-6 py-3">Synopsis</th>
                    <th class="font-bold px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(script ,index) in scripts_needing_approval" :key="script.id" class="bg-white border-b">
                    <td class="px-6 py-4">{{ index + 1 }}</td>
                    <td class="px-6 py-4">{{ script.script_title }}</td>
                    <td class="px-6 py-4">{{ script.script_synopsis }}</td>
                    <td class="px-6 py-4">
                        <StandardButton text="View"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</ScriptwritersAdmin>
</template>