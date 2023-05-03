<script setup>
import ScriptNavBar from '@/Components/ScriptNavBar.vue';
import ScriptWriterDashboardLayout from '@/Layouts/ScriptWriterDashboardLayout.vue';
import StandardButton from '@/Components/StandardButton.vue';

const props = defineProps(['scripts'])

</script>

<template>
  <ScriptNavBar>
    <StandardButton text="New Script" :isLink=true :href="route('scriptwriter.add_script')"></StandardButton>
    <div class="content">
      <ScriptWriterDashboardLayout v-for="script in scripts" :key="script.id" 
        :stitle= "script.script_title"
        :body="script.script_synopsis"
        :genres="script.genres"
        >
        <img :src="'/storage/'+script.poster_image" alt="Script offical blopper image" style="width:100%">
      </ScriptWriterDashboardLayout>
    
      <p v-if="scripts.length === 0">No Scripts Have been Added</p>
    
    </div>
  </ScriptNavBar>

</template>

<style scoped>


.content {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    margin-top: 20px;
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
    .card {
        width: 100%;
    }
}

@media only screen and (min-width: 1200px) {
    .content {
        padding-top: 30px;
        gap: 50px;
    }
}
</style>
