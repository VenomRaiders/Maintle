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
    /* border: 1px solid red; */
    background-color: var(--primary-color);
    border-radius: 5px;
    display: flex;
    align-items: center;
    width: fit-content;
    padding: 12px 10px;
    color: white;
}

.account-container .account-info {
    margin-left: 10px;
}

img {
    height: 50px;
    width: 50px;
    border-radius: 100%;
    background-size: contain;
}
</style>