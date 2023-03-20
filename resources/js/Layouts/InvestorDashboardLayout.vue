<script setup>
import { ref } from 'vue';

const showSideBar = ref(true);
function checkUserAgent() {
    if (window.innerWidth < 768) {
        showSideBar.value = false;
    }else{
        showSideBar.value = true;
    }
}

window.addEventListener('resize', checkUserAgent);
</script>

<template>
    <div class="w-full min-h-screen flex bg-[#CCEEE4]">
        <aside :class="{'hidden': !showSideBar}" class="w-1/5 bg-white">
            <h1 class="text-center my-4 font-bold font-mono text-2xl">
                <span class="bg-yellow-200 rounded-full px-2 border-l-4 border-black">M</span>aintle</h1>
        </aside>
        <div class="w-full h-full">
            <nav class="py-1 bg-white">
                <button @click="showSideBar = !showSideBar" class="">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </nav>
            <main class="w-full h-sceen rounded-tr-lg">
                <slot />
            </main>
        </div>
    </div>
</template>