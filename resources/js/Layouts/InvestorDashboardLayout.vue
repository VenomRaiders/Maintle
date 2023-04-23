<script setup>
import { Link } from "@inertiajs/vue3"
import { ref } from "vue"
import SuccessMessage from "@/Components/SuccessMessage.vue"
import ErrorMessage from "@/Components/ErrorMessage.vue"

const showSideBar = ref(false)
function checkUserAgent() {
    if (window.innerWidth < 1999) {
        showSideBar.value = false;
    }else{
        showSideBar.value = true;
    }
}

window.addEventListener('resize', checkUserAgent);
</script>

<template>
  <main>
    
    <section id="sw-nav" :class="{'hidden': !showSideBar}">
      <div class="sw-nav-items">
        <Link :href="route('home')" class="logo">
          <img src="/images/maintle-logo.png" alt="maintle logo image">
        </Link>
      
        <ul>
          <Link :href="route('scriptwriter.dashboard')" as="li" :class="{'active': $page.url.startsWith('/scriptwriter/dashboard')}" class="cursor-pointer">
            My purchases
          </Link>
          <Link :href="route('scriptwriter.statistics')" as="li" :class="{'active': $page.url.startsWith('/scriptwriter/statistics')}" class="cursor-pointer">
            Transaction history
          </Link>
        </ul>

        <div class="sw-nav-footer">
          <ul>
            <Link :href="route('logout')" method="post" as="li" class="cursor-pointer">
              Logout
            </Link>
          </ul>
        </div> 
      </div>
      
    </section>
    <!-- Position also matters where you are emitting the signal -->
    <button class="toggle" @click="showSideBar = !showSideBar">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 25 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
      </svg>
    </button>
    <section id="sw-body">
        <SuccessMessage v-if="$page.props.flash.message"> {{$page.props.flash.message}} </SuccessMessage>
        <ErrorMessage v-if="$page.props.flash.error"> {{$page.props.flash.error}} </ErrorMessage>
        <slot />
    </section>
  </main>
</template>

<style scoped>

/* Mobile view 300px - 1199px */

main {
  background-color: var(--text-color);
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
}

#sw-nav {
  width: 100%;
  position: relative;
  border-right: 1px solid var(--border-color);
  border-radius: 3px;
  font-size: 20px;
  transition: ease-in 0.5s ease;
}

.sw-nav-items a {
  width: 100px;
  height: 70px;
}
.sw-nav-items {
  display: flex;
  flex-direction: column;
}

.sw-nav-items ul {
  padding: 10px 24px;
  height: auto;
}

.sw-nav-items ul li {
  height: 40px;
  border: 1px solid var(--border-color);
  box-shadow: 0 2px 4px 0 var(--shadow-color);
  border-radius: 5px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 15px;
}

.active {
  background-color: var(--primary-color);
  color: var(--text-color);
}

#sw-nav li:hover {
  background-color: var(--alternate-color);
  color: var(--text-color);
}

#sw-body {
  width: 100%;
  /* height: 100svh; */
  padding: 30px;
  background-color: var(--alternate-background-color);
}

.toggle {
  position: absolute;
  top: 0;
  right: 0;
  padding: 10px;
}

/* Media queries for the responsive layout */
/* 1200px -> */
@media only screen and (min-width: 1200px) {
  .toggle {
    display: none;
  }

  main {
    flex-direction: row;
  }

  #sw-body {
    height: 100vh;
  }

  #sw-nav {
    display: block;
    width: 300px;
  }

  .sw-nav-items {
    display: block;
  }
  .sw-nav-items ul {
    padding: 0;
  }
  .sw-nav-items ul li {
    height: 60px;
    border-bottom: 1px solid var(--border-color);
    border-radius: 3px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 18px;
  }

  .sw-nav-footer {
    width: 100%;
    position: absolute;
    left: 0;
    bottom: 0;
  }
}
</style>