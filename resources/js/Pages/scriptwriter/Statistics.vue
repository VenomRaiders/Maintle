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

    <div class="">
        <h1 class="text-center text-4xl">Statistics</h1>
    </div>

  </ScriptNavBar>
</template>