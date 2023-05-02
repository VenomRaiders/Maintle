<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import FooterComponent from "@/Components/Footer.vue";

defineProps({
    toggleClass: {
        type: String,
        default: ""
    },
    tabHeader: {
        type: String,
    }
})

const showDropDown = ref(false);
const user = computed(() => usePage().props.auth.user)


function toggleNavBarOn() {
    document.getElementById("nav").style.width = "250px";
}

function toggleNavBarOff() {
    document.getElementById("nav").style.width = "0";
}
</script>

<template>
    <main class="homepage">
        <section id="nav" class="homepage">
            <div class="nav-image">
                <Link :href="route('home')" class="logo">
                    <img
                        src="/images/maintle-logo.png"
                        alt="maintle logo image"
                    />
                </Link>
            </div>
            <!-- <Link :href="route('home')" class="logo"> -->
            <!-- </Link> -->
            <a class="closebtn" @click="toggleNavBarOff()">&times;</a>
            <div class="nav-links">
                <Link :href="route('home')" class="text-white uppercase" :class="{'active': $page.url.endsWith('/')}">
                   <i class="fa-solid fa-house"></i> Home
                </Link>
                <Link :href="route('scripts')" class="text-white uppercase" :class="{'active': $page.url.startsWith('/scripts')}">
                    <i class="fa-solid fa-scroll"></i> Scripts
                </Link>
                <Link :href="route('projects')" class="text-white uppercase">
                    <i class="fa-solid fa-clapperboard"></i> Projects
                </Link>
                <Link :href="route('about_us')" class="text-white uppercase">
                    <i class="fa-solid fa-circle-question"></i> About us
                </Link>
                <Link :href="route('blog')" class="text-white uppercase">
                    <i class="fa-solid fa-blog"></i> Blog
                </Link>
                <div v-if="!user" class="">
                    <button class="uppercase flex items-center">
                        <Link :href="route('login')">
                            <i class="fa-solid fa-right-to-bracket"></i> Login
                        </Link>
                        <i @click="showDropDown = !showDropDown" class="fa-solid fa-caret-down"></i>
                    </button>

                    <div v-if="showDropDown" id="dropdownitems" class="dropdown">
                        <Link :href="route('register.scriptwritter')" class=" text-white px-2">
                            <i class="fa-solid fa-user-plus"></i> Register
                        </Link>
                    </div>
                </div>

                <div v-if="user" class="flex flex-col md:flex-row md:space-x-8 items-center">
                    <Link :href="route('dashboard')" class="text-white uppercase">Dashboard</Link>
                    <Link :href="route('logout')" method="POST" class="text-white uppercase">Logout</Link>
                </div>
            </div>
        </section>
        <section id="nav-body" :class="toggleClass">
            <div class="nav-top homepage">
                <!-- toggle button -->
                <button class="toggle" @click="toggleNavBarOn()">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 25 24"
                        stroke-width="1.5"
                        stroke="white"
                        class="w-9 h-9 "
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                        />
                    </svg>
                </button>
                <Link :href="route('home')" as="div" class="logo cursor-pointer">
                    <img
                        src="/images/maintle-logo.png"
                        alt="maintle logo image"
                    />
                </Link>
            </div>
            <div class="body-wrapper">
                <div v-if="!$page.url.endsWith(('/'))">
                   <h1 class="tab-header">{{ tabHeader }}</h1>
                   <hr class="st"> 
                </div>
                
                <slot />
            </div>
        </section>
    </main>
    <FooterComponent></FooterComponent>
</template>

<style scoped>
/* Default Mobile styling */

main {
    display: flex;
}

/* Nav bar section */
#nav {
    height: 100%;
    width: 0;
    position: fixed;
    overflow-x: hidden;
    z-index: 2;
    top: 0;
    left: 0;
    color: var(--text-color);
    transition: 0.5s;
    padding-top: 70px;
}

.active {
    background: var(--primary-color);
}

/* special styling for the login drop down */
.dropdown {
    border-radius: 5px;
    position: absolute;
    margin-left: 35px;
    margin-top: -10px;
    background-color: var(--secondary-color);
}

.dropdown a, .st {
    border: 1px solid var(--border-color)
}
/* end of special styling of dropdoqn */

#nav .nav-image {
    display: none;
}

#nav > .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 40px;
    cursor: pointer;
    color: red;
    color: rgba(255, 255, 255, 0.836);
    transition: 0.3s;
}

#nav > .closebtn:hover {
    color: white;
}

.nav-links {
    display: flex;
    flex-direction: column;
}

.nav-links a, .nav-links button {
    display: flex;
    align-items: center;
    padding: 15px 27px;
    transition: 0.3s;
}

.nav-links a > i, .nav-links button > i {
    font-size: 15px;
    margin-right: 10px;
}

.nav-links a {
    display: flex;
    align-items: center;
    justify-content: center;
}

.nav-links a:hover {
    background: var(--alternate-color);
}

/* body section */
#nav-body {
    width: 100%;
    height: 100svh;
    overflow-y: auto;
    padding: 10px 20px;
    background-color: var(--alternate-background-color);
}

.nav-top {
    width: 100%;
    position: fixed;
    left: 0;
    top: 0;
    height: 70px;
    z-index: 1;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 15px;
}

.nav-top a {
    height: inherit;
    background-size: cover;
}

.nav-top img {
    height: 70px;
    margin-right: 10px;
}

.logo {
    margin-right: -15px;
}

.body-wrapper {
    padding-top: 70px;
}

.body-wrapper h1 {
    line-height: 35px;
}

.st {
    height: 5px;
    background: linear-gradient(120deg,
        var(--alternate-color),
        var(--hues-2)
    );
}

.tab-header {
    font-family: 'Montserrat Alternates', sans-serif;
    font-weight: bold;
    text-transform: uppercase;
    padding-top: 15px;
    margin-bottom: 5px;
}

/* Scaling for desktop screens */
/* Responsive media queries to scale to desktop size */

@media only screen and (min-width: 690px) {
    .body-wrapper h1 {
        font-size: 18px;
    }
}

@media only screen and (min-width: 1100px) {
    main {
        flex-direction: column;
    }

    #nav-body .nav-top {
        display: none;
        height: 60px;
    }
    #nav {
        all: unset;
        color: var(--text-color);
        transition: 0.5s;
        display: flex;
        align-items: center;
        z-index: 1;
    }

    .nav-links {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        align-items: center;
    }

    .nav-links a {
        font-size: 15px;
        height: fit-content;
        padding: 10px;
        border-radius: 5px;
    }
    
    #nav .nav-image img {
        height: 100px;
        margin-left: 29px;
    }

    #nav .closebtn {
        display: none;
    }

    #nav .nav-image {
        width: 100%;
        display: flex;
    }

    .nav-links {
        margin-right: 20px;
    }
}

@media only screen and (min-width: 1200px) {
    .body-wrapper {
        padding: 25px 30px;
    }
}

/* fix the about us cloaking together */
@media only screen and (max-width: 1544px) {
    .nav-image {
        max-width: 40%;
    }
}

@media only screen and (max-width: 1420px) {
    .nav-image {
        max-width: 35%;
    }
}

@media only screen and (max-width: 1200px) {
    .nav-image {
        max-width: 25%;
    }
}
</style>
