<script setup>
import { Link } from "@inertiajs/vue3";
import SuccessMessage from "@/Components/SuccessMessage.vue";
import ErrorMessage from "@/Components/ErrorMessage.vue";

const props = defineProps(['tab'])

function toggleNavBarOn() {
  document.getElementById("nav").style.width = "250px";
}

function toggleNavBarOff() {
  document.getElementById("nav").style.width = "0";
}
</script>

<template>
  <main>
    <section id="nav">
      <div class="nav-image">
        <Link :href="route('home')" class="logo">
        <img src="/images/maintle-logo.png" alt="maintle logo image" />
        </Link>
      </div>
      <!-- <Link :href="route('home')" class="logo"> -->
      <!-- </Link> -->
      <a class="closebtn" @click="toggleNavBarOff()">&times;</a>
      <div class="nav-links">
        <Link :href="route('scriptwriter.dashboard')" :class="{
            active: $page.url.startsWith('/scriptwriter/dashboard'),
          }"><i class="fa-solid fa-scroll"></i> My Scripts</Link>
        <Link :href="route('logout')" method="post" as="button">
        <i class="fa-sharp fa-solid fa-door-open"></i> Logout
        </Link>
      </div>
    </section>
    <section id="nav-body">
      <SuccessMessage v-if="$page.props.flash.message">
        {{ $page.props.flash.message }}
      </SuccessMessage>
      <ErrorMessage v-if="$page.props.flash.error">
        {{ $page.props.flash.error }}
      </ErrorMessage>
      <div class="nav-top">
        <button class="toggle" @click="toggleNavBarOn()">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 25 24" stroke-width="1.5" stroke="currentColor"
            class="w-9 h-9">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
        <Link :href="route('home')" as="div" class="logo cursor-pointer">
        <img src="/images/maintle-logo.png" alt="maintle logo image" />
        </Link>
      </div>
      <div class="body-wrapper">
        <div v-if="!$page.url.endsWith('/add_script')">
          <h1>{{ $page.props.tab }}</h1>
          <hr class="st" />
        </div>
        <slot />
      </div>
    </section>
  </main>
</template>

<style scoped>
main {
  display: flex;
}

#nav {
  height: 100%;
  width: 0;
  position: fixed;
  overflow-x: hidden;
  z-index: 1;
  top: 0;
  left: 0;
  background: linear-gradient(120deg,
      var(--primary-color),
      var(--alternate-color));
  color: var(--text-color);
  transition: 0.5s;
  padding-top: 70px;
}

.active {
  background: linear-gradient(120deg,
      var(--primary-color),
      var(--secondary-color));
  font-size: 20px;
}

#nav .nav-image {
  display: none;
}

#nav>.closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 40px;
  cursor: pointer;
  color: red;
  color: rgba(255, 255, 255, 0.836);
  transition: 0.3s;
}

#nav>.closebtn:hover {
  color: white;
}

.nav-links {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.nav-links a,
.nav-links button {
  display: flex;
  align-items: center;
  width: 100%;
  padding: 15px 27px;
  transition: 0.3s;
}

.nav-links a>i,
.nav-links button>i {
  font-size: 15px;
  margin-right: 10px;
}

.nav-links a:hover,
.nav-links button:hover {
  background: linear-gradient(120deg,
      var(--primary-color),
      var(--secondary-color));
  font-size: 18px;
}

#nav-body {
  width: 100%;
  height: 100svh;
  overflow-y: auto;
  padding: 10px 20px;
  background-color: var(--alternate-background-color);
}

.nav-top {
  width: 100%;
  height: 60px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.nav-top a {
  height: inherit;
  background-size: cover;
}

.nav-top img {
  height: 70px;
}

.body-wrapper {
  padding-top: 10px;
  padding-bottom: 10px;
}

.body-wrapper h1 {
  line-height: 35px;
  font-family: 'Montserrat Alternates', sans-serif;
}

.st {
  height: 5px;
  background: linear-gradient(120deg,
      var(--primary-color),
      var(--secondary-color));
}

/* Responsive media queries to scale to desktop size */

@media only screen and (min-width: 690px) {
  .body-wrapper h1 {
    font-size: 18px;
  }
}

@media only screen and (min-width: 1100px) {
  #nav-body .nav-top {
    display: none;
  }

  #nav {
    min-width: 250px;
    min-height: 100svh;
    position: relative;
    padding-top: 0;
  }

  #nav .closebtn {
    display: none;
  }

  #nav .nav-image {
    width: 100%;
    display: flex;
  }
}

@media only screen and (min-width: 1200px) {
  .body-wrapper {
    padding: 25px 30px;
  }
}
</style>
