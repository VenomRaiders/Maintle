<script setup>
import StandardButton from './StandardButton.vue';
import Tags from './Tags.vue';


defineProps({
  stitle: {
    type: String,
  },
  body: {
    type: String,
  },
  genres: {
    type: Object,
  },
  posterImage: {
    type: String
  },
  scriptId: {
    type: Number,
  }
});
</script>
<template>
  <div class="card">
    <div class="col-1">
        <img :src="'/storage/' + posterImage" alt="Script offical blopper image" style="width:100%">
    </div>
    <div class="col-2">
      <div class="card-body">
        <h1>{{ stitle }}</h1>
        <Tags v-for="genre in genres" :key="genre.id" :text="genre.genre"/>
        <p>{{ body }}</p>
      </div>
      <div class="card-buttons">
        <StandardButton text="View" :is-link=true :href="route('scriptwriter.script.view', id=scriptId)" />
      </div>
    </div>
  </div>
</template>

<style scoped>
/* default mobile styling */
.card {
  display: flex;
  height: 200px;
  border: 1px solid var(--border-color);
  overflow: hidden;
  background-color: white;
  border-radius: 5px;
}

.card h1 {
  font-weight: bold;
  font-family: 'Montserrat Alternates', sans-serif;
}

.col-1 {
  min-width: 30%;
  width: 40%;
}

.col-1 img {
  width: 100%;
  background-size: contain;
  height: 100%;
}

.col-2 {
  width: 100%;
  position: relative;
}

.card-body {
  padding: 7px 12px;
  width: auto;
}

.card-body span {
  color: blue;
}

.card-body p {
  margin-top: 5px;
  font-size: 14px;
  width: 300px;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
}

.card-buttons {
  width: 100%;
  padding: 9px 12px;
  position: absolute;
  bottom: 0;
  display: flex;
  justify-content: flex-end;
}

.card-buttons .btn {
  font-size: 13px;
  height: 35px;
  margin-right: 10px;
}

/* Scaling for desktop versions */

/* overide the default growth size on this screen size */

@media only screen and (min-width: 900px) {
  .card {
    display: flex;
    flex-direction: column;
    height: auto;
    max-width: 350px;
  }

  .col-1 {
    all: unset;
  }

  .card img {
    height: 300px;
  }

  .card-buttons {
    all: unset;
    display: flex;
    padding: 10px;
    justify-content: flex-end;
  }
}
</style>
