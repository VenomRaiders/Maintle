<script setup>
import { Head,router } from "@inertiajs/vue3"
import StandardButton from '@/Components/StandardButton.vue';
import HomePageLayoutVue from "@/Layouts/HomePageLayout.vue";
import ScriptAndProjectCard from "@/Components/ScriptAndProjectCard.vue";


const props = defineProps(['script','admin_contact'])
// const user = computed(() => usePage().props.auth.user)

function buyScript(id){
    router.post('/scripts/buy', {script_id: id})
}

</script>

<template>
    <Head title="Scripts" />

    <HomePageLayoutVue>
        <div class="flex justify-center">
                <div class="flex w-4/5 space-x-2">
                    <div class="w-1/2 script-cover mt-2">
                        <img :src="'/storage/'+script.poster_image" alt="Script offical blopper image" style="width:100%">
                    </div>
                    <div class="w-1/2 py-8">
                        <div class="bg-slate-200 p-4">
                            <p class="text-xl">
                                {{ script.poster_image }}
                                <span class="font-bold">Title:</span> {{ script.script_title }}
                            </p>
                            <p class="text-xl">
                                <span class="font-bold">Logline:</span> {{ script.script_logline }}
                            </p>
                            <p class="text-xl">
                                <span class="font-bold">Genre:</span> 
                                <span v-for="genre in script.genres" :key="genre.id" class="bg-primary text-white px-2 mx-1 rounded-md">{{ genre.genre }}</span>
                            </p>
                            <p class="text-xl">
                                <span class="font-bold">SubGenre:</span> 
                                <span v-for="genre in script.sub_genres" :key="genre.id" class="bg-primary text-white px-2 mx-1 rounded-md">{{ genre.genre }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex space-x-2 justify-center my-2">
                <a :href="'https://api.whatsapp.com/send?phone='+admin_contact+'&text=I%20am%20contacting%20for%20more%20information%20on%20the%20script%20'+script.script_title" class="bg-primary text-white p-2 rounded-md" target="_blank">Contact what with admin</a>
                <StandardButton text="Buy" @click.prevent="buyScript(script.id)" />
            </div>
    </HomePageLayoutVue>
            
</template>