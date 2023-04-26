<script setup>
import ScriptNavBar from '@/Components/ScriptNavBar.vue';
import ScriptsCard from '@/Components/ScriptsCard.vue';
import StandardButton from '@/Components/StandardButton.vue';

const props = defineProps(['scripts'])

</script>

<template>
  <ScriptNavBar>
    <div>
      <StandardButton text="New Script" :isLink=true :href="route('scriptwriter.add_script')"></StandardButton>
    </div>
    <div class="all-scripts">
      <div class="flex flex-wrap">
        <ScriptsCard v-for="script in scripts" :key="script.id" 
        :stitle= "script.script_title"
        :body="script.script_synopsis"
        :genres="script.genres"
        >
        <img :src="'/storage/'+script.poster_image" alt="Script offical blopper image" style="width:100%">
      </ScriptsCard>
      </div>
    
    <p v-if="!scripts">No Scripts Have been Added</p>
    
    </div>
  </ScriptNavBar>

</template>

<style scoped>

.btn {
  width: fit-content;
}
.all-scripts {
  margin-top: 30px;
  width: 100%;
  overflow-y: auto;
  padding: 10px;
  max-height: 790px;
  display: flex;
  flex-wrap: wrap;
  gap: 50px;
}

/* Media queries for the responsive layout */

@media only screen and (min-width: 1050px) {
  .all-scripts .card {
    flex-grow: 0.4;
  }
}

/* 1200px -> 1700px */
@media only screen and (min-width: 1200px) { 

  .all-scripts {
    max-height: 590px;
    overflow-y: auto;
  }
  .all-scripts .card {
    margin-right: 5px;
    margin-bottom: 5px;
  }

  .card img {
    height: 300px;
  }
  
  .all-scripts .card {
    flex-grow: 1;
  }
}

@media only screen and (min-width: 1307px) {
  .all-scripts .card {
    flex-grow: 0.4;
  }
}
</style>
