<script setup>
function closeMessage() {
    document.getElementById("success-box").style.display = "none";
}
</script>

<template>
    <div id="success-box" class="p-4 my-2 text-sm text-primary bg-green-100 rounded-lg">
        <slot />
        <a class="closebtn float-right" @click="closeMessage()">&times;</a>
    </div>
</template>

<style>
.closebtn {
    font-size: 30px;
    cursor: pointer;
}
</style>