<script setup>
import ScriptNavBar from '@/Components/ScriptNavBar.vue';
import ScriptsCard from '@/Components/ScriptsCard.vue';
import StandardButton from '@/Components/StandardButton.vue';

</script>

<template>
  <ScriptNavBar>
    <div>
      <StandardButton text="New Script" :isLink=true :href="route('scriptwriter.add_script')"></StandardButton>
    </div>
    <div class="all-scripts">
      <ScriptsCard
      stitle="The Ducklin Mass"
      body="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus quae enim aliquid culpa, 
        autem ut optio harum dolorum fugiat laudantium. 
        Unde eius reprehenderit sed illo earum vero dolores mollitia 
        excepturi!"
      >
      <img src="/images/image.jpg" alt="Script offical blopper image" style="width:100%">
      </ScriptsCard>
      <ScriptsCard
      stitle="The Ducklin Mass"
      body="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus quae enim aliquid culpa, 
        autem ut optio harum dolorum fugiat laudantium. 
        Unde eius reprehenderit sed illo earum vero dolores mollitia 
        excepturi!"
      >
      <img src="/images/image.jpg" alt="Script offical blopper image" style="width:100%">
      </ScriptsCard>
      <ScriptsCard
      stitle="The Ducklin Mass"
      body="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus quae enim aliquid culpa, 
        autem ut optio harum dolorum fugiat laudantium. 
        Unde eius reprehenderit sed illo earum vero dolores mollitia 
        excepturi!"
      >
      <img src="/images/image.jpg" alt="Script offical blopper image" style="width:100%">
      </ScriptsCard>

      <ScriptsCard
      stitle="The Ducklin Mass"
      body="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus quae enim aliquid culpa, 
        autem ut optio harum dolorum fugiat laudantium. 
        Unde eius reprehenderit sed illo earum vero dolores mollitia 
        excepturi!"
      >
      <img src="/images/image.jpg" alt="Script offical blopper image" style="width:100%">
      </ScriptsCard>
      
    </div>
  </ScriptNavBar>

</template>

<style scoped>
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

button:hover {
  cursor: pointer;
  background-color: var(--alternate-color);
  /* transition: 0.3s; */
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
    overflow-y: scroll;
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
