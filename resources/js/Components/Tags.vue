<script>
export default {
  props: ["text"]
}
</script>

<template>
    <span class="tag-text">#{{ text }}</span>
</template>

<style scoped>
.tag-text {
    color: #2b2bf1;
    background-color: rgb(235, 235, 235);
    font-size: 14px;
    padding: 2px 10px;
    font-weight: bold;
    border-radius: 5px;
}
</style>