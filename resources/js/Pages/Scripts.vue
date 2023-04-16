<script setup>
import { Head, Link } from "@inertiajs/vue3"
import NavBar from "@/Components/NavBar.vue"
import ScriptsCard from '@/Components/ScriptsCard.vue';
import StandardButton from '@/Components/StandardButton.vue';

const props = defineProps(['scripts'])

function buyScript(id){
    console.log(id)
}

</script>

<template>
    <Head title="Scripts" />

    <div id="catalog">
        <NavBar class="bg-primary"/>
        
        <div class="mx-4">
            <h1 class="text-center text-4xl font-bold my-4">Available Scripts</h1>
            <div class="">
                <div class="flex space-x-4 flex-wrap">
                    <div v-for="script in scripts" :key="script.id" class="w-96">
                        <img :src="'/storage/'+script.poster_image" alt="Script offical blopper image" style="width:100%">
                        <Link href="#" as="div" class="shadow-md cursor-pointer p-2">
                            <h1 class="my-2 font-bold text-2xl">{{ script.script_title }}</h1>
                            <p>{{ script.script_synopsis }}</p>
                            <StandardButton text="Buy" @click.prevent="buyScript(script.id)" />
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>