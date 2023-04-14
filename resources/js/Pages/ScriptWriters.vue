<script setup>
import { Head, Link } from "@inertiajs/vue3"
import NavBar from "@/Components/NavBar.vue"

const props = defineProps(['scriptWriters','okay'])
console.log(props.scriptWriters)
</script>

<template>
    <Head title="Script Writters"/>

    <div id="catalog">
        <NavBar class="bg-primary"/>
        
        <div class="">
            {{ scriptWriters }}
            <h1 class="text-center text-4xl font-bold my-4">Our Verified Script Writers</h1>
            <div class="">
                <div v-for="scriptWriter in scriptWriters" :key="scriptWriter.id" class="">
                    {{ scriptWriter.username }}
                </div>
            </div>
        </div>
    </div>
</template>