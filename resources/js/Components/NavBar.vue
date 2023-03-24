<script setup>
import { Link } from "@inertiajs/vue3"
import { ref } from "vue"
import MaintleLogo from "@/Components/MaintleLogo.vue"

const showMobileNav = ref(false)
const showDropDown = ref(false)
</script>

<template>
    <nav class="container px-4 md:py-0 md:mx-auto flex justify-between" :class="{'items-center': !showMobileNav}">
        <MaintleLogo />
        <div :class="{'mt-2': showMobileNav}">
            <button @click="showMobileNav = !showMobileNav" class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                </svg>
            </button>
            <div id="links" :class="{'hidden md:flex': !showMobileNav}" class="flex flex-col md:flex-row md:space-x-8 py-2 text-md">
                <Link href="" class="text-white uppercase">Home</Link>
                <Link href="" class="text-white uppercase">Scripts</Link>
                <Link href="" class="text-white uppercase">Projects</Link>
                <Link href="" class="text-white uppercase">About us</Link>
                <Link href="" class="text-white uppercase">Blog</Link>
                <div class="">
                    <button class="bg-purple-400 text-white uppercase px-2 flex space-x-1">
                        Login
                        <svg @click="showDropDown = !showDropDown" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    <div v-if="showDropDown" id="dropdownitems" class="absolute bg-white mt-0 py-2 px-2">
                        <Link href="" class="bg-purple-400 text-white px-2">Register</Link>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>