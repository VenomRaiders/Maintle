<script>
import StandardButton from './StandardButton.vue';
import Tags from './Tags.vue';

export default {
  props: ['stitle','body'],
  components: {
    StandardButton,
    Tags
   }
}
</script>

<template>
<div class="card">
    <slot/>
  <div class="container">
    <h4><b>{{ stitle }}</b></h4>
    <div class="script-tags">
        <Tags text="Movies"/>
        <Tags text="Love"/>
        <Tags text="Romance"/>
    </div>
    <div class="script-content">
        <p>{{ body }}</p>
    </div>
    <div class="buttons">
        <StandardButton text="View"/>
        <StandardButton text="Edit"/>
    </div>
  </div>
</div>
</template>

<style>
.card img {
    width: 100%;
    height: 300px;
    object-fit: fill;
}
.card {
    display: grid;
    grid-template-rows: 300px 1fr;
    background-color: var(--text-color);
    box-shadow: 0 4px 8px 0 var(--shadow-color);
    transition: 0.3s;
    border-radius: 5px;
    width: 350px;
    height: 470px;
    margin-top: 15px;
}


.card:hover {
    box-shadow: 0 8px 16px 0 var(--shadow-color);
}


.card .container {
    padding: 7px 16px;
    display: flex;
    flex-direction: column;
    align-items: right;
}

.card h4 {
    font-weight: bold;
    font-size: 20px;
}

.card .script-tags {
    display: flex;
    gap: 10px;
}

.card .script-content {
    width: 100%;
    max-height: 50px;
    overflow: hidden;
    text-overflow: ellipsis " [..]";
    white-space: wrap;
}
.card .buttons {
    width: 100%;
    display: flex;
    gap: 5px;
}
</style>