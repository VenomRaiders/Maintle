<script setup>
import { Link,usePage } from "@inertiajs/vue3"
import { ref, computed } from "vue"
import MaintleLogo from "@/Components/MaintleLogo.vue"

const showMobileNav = ref(false)

const user = computed(() => usePage().props.auth.user)
const role = computed(() => usePage().props.auth.role)
</script>

<template>
    <nav>
        <MaintleLogo />
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
            </svg>
        </button>
        <div id="links">
            <Link :href="route('home')" class="text-white uppercase" :class="{'active': $page.url.endsWith('/')}">Home</Link>
            <Link :href="route('scripts')" class="text-white uppercase" :class="{'active': $page.url.startsWith('/scripts')}">Scripts</Link>
            <Link href="" class="text-white uppercase">Projects</Link>
            <Link href="" class="text-white uppercase">About us</Link>
            <Link href="" class="text-white uppercase">Blog</Link>
            <div v-if="!user" class="">
                <button class="bg-purple-400 text-white uppercase px-2 flex space-x-1">
                    <Link :href="route('login')">Login</Link>
                    <svg @click="showDropDown = !showDropDown" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>

                <div v-if="showDropDown" id="dropdownitems" class="absolute bg-white mt-0 py-2 px-2">
                    <Link :href="route('register.scriptwritter')" class="bg-purple-400 text-white px-2">Register</Link>
                </div>
            </div>

            <div v-if="role == 'investor'" class="flex flex-col md:flex-row md:space-x-8 items-center">
                <Link href="#" class="text-white uppercase">Catalog</Link>
            </div>

            <div v-if="user" class="flex flex-col md:flex-row md:space-x-8 items-center">
                <Link :href="route('dashboard')" class="text-white uppercase">Dashboard</Link>
                <Link :href="route('logout')" as="button" method="POST" class="text-white uppercase bg-[#316802] p-2 rounded-md">Logout</Link>
            </div>
        </div>
    </nav>
</template>

<style scoped>

nav {
    display: flex;
}

#links a {
    padding: 7px;
    border-radius: 3px;
}

#links a:hover {
    background-color: var(--primary-color);
}
</style>