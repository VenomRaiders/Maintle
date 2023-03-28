<script setup>
import ScriptNavBar from '@/Components/ScriptNavBar.vue';
import ScriptsCard from '@/Components/ScriptsCard.vue';
import StandardButton from '@/Components/StandardButton.vue';

function testEvent() {
  console.log("clicked")
}
</script>

<template>
  <ScriptNavBar>
    <div>
      <StandardButton text="New Script"></StandardButton>
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
    <div class="buttons">
        <StandardButton text="<" @click="testEvent"/>
        <StandardButton text=">" @click="testEvent"/>
      </div>
  </ScriptNavBar>

</template>

<style scoped>
.all-scripts {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
  overflow: hidden;
}

.buttons {
  margin-right: 40px;
  display: flex;
  gap: 10px;
  justify-content: flex-end;
}

button:hover {
  cursor: pointer;
  background-color: var(--alternate-color);
  /* transition: 0.3s; */
}
</style>
