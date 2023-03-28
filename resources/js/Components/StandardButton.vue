<script>
export default {
  props: ["text"],
  
}
</script>

<template>
    <button class="btn btn-primary">{{ text }}</button>
</template>

<style scoped>
.btn {
  display: flex;
  justify-content: center;
  align-items: center;
  min-width: 80px;
  height: 43px;
  color: var(--text-color);
  background-color: var(--secondary-color);
  padding: 10px;
  border-radius: 5px;
}


</style>