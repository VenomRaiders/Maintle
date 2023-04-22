<script setup>
import { Head, Link, usePage, router } from "@inertiajs/vue3"
import { computed } from "vue"
import NavBar from "@/Components/NavBar.vue"
import StandardButton from '@/Components/StandardButton.vue';

const props = defineProps(['scripts'])
const user = computed(() => usePage().props.auth.user)

function buyScript(id){
    router.post('/scripts/buy', {script_id: id})
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
                        <Link :href="route('script_details', script.id)" as="div" class="shadow-md cursor-pointer p-2">
                            <h1 class="my-2 font-bold text-2xl">{{ script.script_title }}</h1>
                            <p class="mb-2">{{ script.script_synopsis }}</p>
                            <div class="flex space-x-2">
                                <StandardButton text="View"/>
                                <StandardButton text="Buy" @click.prevent="buyScript(script.id)" />
                            </div>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>