<script setup>
import Tags from './Tags.vue';

defineProps({
    stitle: {
        type: String
    },
    body: {
        type: String
    },
    genres: {
        type: Object,
    },
    posterImage: {
        type: String
    }
})
</script>

<template>
<div class="card">
    <div class="col-1">
        <img :src="'/storage/'+posterImage" alt="Script offical blopper image" style="width:100%">
    </div>
    <div class="col-2 cursor-pointer">                            
        <div class="card-body">
            <h4><b>{{ stitle }}</b></h4>
            <Tags v-for="genre in genres" :key="genre.id" :text="genre.genre"/>
            <p>{{ body }}</p>
            <p class="price">1000$</p>

        </div>
        <div class="card-buttons">
            <slot name="buttons"/>
        </div>
    </div>
</div>
</template>

<style scoped>
/* default mobile styling */

.card {
    display: flex;
    width: 300px;
    flex-direction: column;
    border: 1px solid var(--border-color);
    overflow: hidden;
    background-color: white;
    border-radius: 8px;
}

.card img {
    width: 100%;
    height: 200px;
}

.card h1 {
    font-weight: bold;
}

.col-2 {
    width: 100%;
    position: relative;
}
.card-body {
    padding: 7px 12px;
}

.card-body p {
    margin-top: 5px;
    font-size: 14px;
    width: inherit;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}

.card-buttons {
    display: flex;
    margin-bottom: 10px;
    padding: 10px;
}

.price {
    font-size: 20px;
    color: blue;
    background-color: var(--alternate-background-color);
    max-width: fit-content;
    padding: 2px;
}



/* Scaling for desktop versions */

/* overide the default growth size on this screen size */
@media only screen and (min-width: 535px) {
  .tag-text {
      font-size: 13px;
    }
}
</style>