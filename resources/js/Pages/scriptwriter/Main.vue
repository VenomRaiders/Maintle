<script setup>
import ScriptsCard from '@/Components/ScriptsCard.vue';
import ScriptwriterDashboardLayout from '@/Layouts/ScriptwriterDashboardLayout.vue';
import StandardButton from '@/Components/StandardButton.vue';

const props = defineProps(['scripts', 'tab'])

</script>

<template>
  <ScriptwriterDashboardLayout>
    <StandardButton text="New Script" :isLink=true :href="route('scriptwriter.add_script')"></StandardButton>
    <div class="content">
      <ScriptsCard v-for="script in scripts" 
        :key="script.id" 
        :stitle= "script.script_title"
        :body="script.script_synopsis"
        :genres="script.genres"
        :poster-image="script.poster_image"
        :script-id="script.id"
        >
      </ScriptsCard>
    
      <p v-if="scripts.length === 0">No Scripts Have been Added</p>
    
    </div>
  </ScriptwriterDashboardLayout>

</template>

<style scoped>


.content {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
    margin-top: 50px;
    margin-bottom: 20px;
}

.btn {
    width: fit-content;
    margin-top: 15px;
}

/* Scaling for desktop devices */

@media only screen and (min-width: 690px) {
    .content {
        justify-content: center;
    }
}

@media only screen and (min-width: 1200px) {
    .content {
        padding-top: 30px;
        gap: 50px;
    }
}
</style>
