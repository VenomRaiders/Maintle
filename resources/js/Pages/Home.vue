<script setup>
import { Head, Link } from "@inertiajs/vue3"
import HomePageLayout from "@/Layouts/HomePageLayout.vue";
</script>

<template>
    <Head title="Home"/>
    <HomePageLayout>
        <div class="herro bg-black bg-opacity-70 py-8 px-2 flex flex-col items-center">
            <h1 class="text-white font-bold text-4xl md:text-6xl uppercase">Welcome to the maintle</h1>
            <div class="">
                <h1 class="st font-bold text-xl md:text-2xl my-4 uppercase">Professional Script writers and scripts available</h1>
            <p class="text-white text-justify">A marketing platform for scriptwriters where potential film-makers purchase <br />meaningful scripts for their movies</p>
            </div>
        </div>

        <section id="utils" class="container mx-auto py-8 pr-2 md:pr-0 flex flex-col items-end space-y-4">
            <Link href="#" class="bg-green-300 text-white font-bold rounded-md py-2 text-center w-60">become an investor</Link>
            <Link href="#" class="bg-green-300 text-white font-bold rounded-md py-2 text-center w-60">become a scriptwriter</Link>
        </section>

        <section id="utils-2" class="w-3/5 md:w-2/5 py-10 md:py-16 bg-black bg-opacity-70 flex flex-col items-center justify-center">
            <Link href="#" class="bg-green-300 text-white font-bold rounded-md py-2 px-4 text-center">browse scripts & projects</Link>
        </section>
    </HomePageLayout>
    
</template>

<style scoped>
#utils a, #utils-2 a {
    background-color: var(--primary-color);
}

.st {
    color: var(--alternate-color);
}
</style>