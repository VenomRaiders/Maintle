<script setup>
import { Link } from "@inertiajs/vue3"
import MaintleLogo from "@/Components/MaintleLogo.vue"
</script>

<template>
    <nav class="container mx-auto flex justify-between items-center">
        <MaintleLogo />
        <div id="links" class="flex space-x-8 py-2 text-md">
            <Link href="" class="text-white uppercase">Home</Link>
            <Link href="" class="text-white uppercase">Scripts</Link>
            <Link href="" class="text-white uppercase">Projects</Link>
            <Link href="" class="text-white uppercase">About us</Link>
            <Link href="" class="text-white uppercase">Blog</Link>
            <button class="bg-purple-400 text-white uppercase px-2 flex space-x-1">
                Login
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </button>
        </div>
    </nav>
    <div id="dropdownitems"></div>
</template>