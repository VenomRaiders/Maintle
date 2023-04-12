<script setup>
import { Link } from "@inertiajs/vue3";
import AccountBadge from "@/Components/AccountBadge.vue";

function toggleNavBarOn() {
    document.getElementById("nav").style.width = "250px"
}

function toggleNavBarOff() {
    document.getElementById("nav").style.width = "0"
}
</script>

<template>
    <main>
        <section id="nav">
            <a class="closebtn" @click="toggleNavBarOff()">&times;</a>
            <div class="nav-links">
                <Link href="">Home</Link>
                <Link href="">Projects</Link>
                <Link href="">ScriptWriters</Link>
                <Link href="">Catalog</Link>
                <Link href="">My Profile</Link>
                <Link href="">Logout</Link>
            </div>
        </section>
        <section id="nav-body">
            <div class="nav-top">
                <button class="toggle" @click="toggleNavBarOn()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 25 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
                <Link :href="route('home')" class="logo">
                    <img src="/images/maintle-logo.png" alt="maintle logo image"/>
                </Link>
            </div>
            <slot/>
        </section>
    </main>
</template>

<style scoped>
main {
    display: flex;
}
#nav {
    height: 100%;
    width: 250px;
    position: fixed;
    overflow-x: hidden;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: var(--primary-color);
    color: var(--text-color);
    transition: 0.5s;
    padding-top: 70px;
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
    align-items: center;
}

.nav-links a {
    display: flex;
    width: 100%;
    padding: 15px 27px;
}
.nav-links a:hover {
    background-color: var(--secondary-color);
}

#nav-body {
    width: 100%;
    height: 100svh;
    border: 1px solid orange;
    padding: 20px 20px;
}

.nav-top {
    width: 100%;
    height: 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-top a{
    height: inherit;
    background-size: cover;
}

.nav-top img {
    height: inherit;
}

</style>