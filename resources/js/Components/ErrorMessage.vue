<script setup>
function closeMessage() {
    document.getElementById("error-box").style.display = "none";
}
</script>

<template>
    <div id="error-box" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
        <slot />
        <a class="closebtn float-right cursor-pointer" @click="closeMessage()">&times;</a>
    </div>
</template>

<style>
.closebtn {
    font-size: 30px;
}
</style>