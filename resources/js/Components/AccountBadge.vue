<script setup>
</script>

<template>
    <div class="account-container">
        <div class="account-pic">
            <img src="/images/image.jpg" alt="profile picture">
        </div>
        <div class="account-info">
            <p>Tambe Hanslett</p>
            <small>Edit Profile</small>
        </div>
    </div>

    <!-- <div class="profile-options">
        <p>Open profile</p>
    </div> -->
</template>

<style scoped>
.account-container {
    border: 1px solid red;
    background-color: var(--primary-color);
    border-radius: 7px;
    display: flex;
    align-items: center;
    width: fit-content;
    padding: 5px;
    color: white;
}

.account-container .account-info {
    margin-left: 5px;
}

img {
    height: 50px;
    width: 50px;
    border-radius: 100%;
    background-size: contain;
}
</style>