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
/* default mobile styling */

.card img {
    height: 200px;
    object-fit: fill;
}

.card {
    flex: 1;
    background-color: var(--text-color);
    box-shadow: 0 4px 8px 0 var(--shadow-color);
    transition: 0.5s;
    border-radius: 10px;
    width: 290px;
}

.card:hover {
    box-shadow: 0 8px 16px 0 var(--shadow-color);
}

.card .container {
    padding: 7px 16px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.buttons {
    display: flex;
    gap: 10px;
    font-size: 14px;
}

.buttons .btn {
    min-width: 0; /* reset the default width */
    width: 50px;
    height: 40px;
}

.container div {
    margin-bottom: 7px;
}

.card h4 {
    font-weight: bold;
    font-size: 18px;
}

.card .script-tags {
    display: flex;
    gap: 10px;
}

.card .script-content {
    max-height: 125px;
    text-overflow: ellipsis;
    overflow: hidden;
}

/* Media queries for large screens */

/*  450px */
@media only screen and (min-width: 450px) {
  .card img {
    height: 320px;
  }
}

/*  450px */
@media only screen and (min-width: 535px) {
    p {
        font-size: 16px;
    }

    .card img {
        height: 400px;
    }
    .card h4 {
        font-size: 22px;
    }
}

/* 1200px -> 1700px */
@media only screen and (min-width: 1200px) { 
  .all-scripts {
    max-height: 590px;
    overflow-y: clip;
  }
  .all-scripts .card {
    margin-right: 5px;
    margin-bottom: 5px;
  }

  .card img {
    height: 300px;
  }
  
  .all-scripts .card {
    flex-grow: 0.5;
  }
}
</style>