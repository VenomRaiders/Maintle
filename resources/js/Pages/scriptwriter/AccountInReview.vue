<script setup>
import ScriptNavBar from '@/Components/ScriptNavBar.vue';
import ScriptsCard from '@/Components/ScriptsCard.vue';
import StandardButton from '@/Components/StandardButton.vue';

const props = defineProps(['scripts'])

</script>

<template>
  <ScriptNavBar>
    <div class="flex justify-center items-center h-full">
        <div class="bg-primary rounded-md p-8">
            <h1 class="text-2xl font-bold m-4 text-white">
                Your submited first Script is under review. When your account is validated, You will be able 
                to login and continue using the website
            </h1>
        </div>
    </div>
  </ScriptNavBar>

</template>