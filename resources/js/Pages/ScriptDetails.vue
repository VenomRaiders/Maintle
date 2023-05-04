<script setup>
import { computed } from "vue";
import { Head,router,usePage } from "@inertiajs/vue3"
import StandardButton from '@/Components/StandardButton.vue';
import HomePageLayoutVue from "@/Layouts/HomePageLayout.vue";
import ScriptsViewCard from '@/Components/ScriptsViewCard.vue';

const user = computed(() => usePage().props.auth.user)
const role = computed(() => usePage().props.auth.role)

const props = defineProps(['script','admin_contact'])

function buyScript(id){
    router.post('/scripts/buy', {script_id: id})
}

</script>

<template>
    <Head title="Scripts" />
    <HomePageLayoutVue tab-header="Scripts Gallery -> View Script">
        <div class="content">
            <ScriptsViewCard>
                <div v-if="!user || role == 'investor'" class="fix-a">
                    <a :href="'https://api.whatsapp.com/send?phone='+admin_contact+'&text=I%20am%20contacting%20for%20more%20information%20on%20the%20script%20'+script.script_title" class="bg-[var(--primary-color)] text-white p-2 rounded-md" target="_blank">Message Admin</a>
                    <StandardButton text="Buy" @click.prevent="buyScript(script.id)" />
                </div>
            </ScriptsViewCard>
        </div>
    </HomePageLayoutVue>
            
</template>
<style scoped>
/* Default styling is for mobile */

.content {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    margin-bottom: 20px;
}

.btn {
    width: fit-content;
    margin-top: 15px;
}

/* Scaling for desktop devices */

@media only screen and (min-width: 690px) {
    .card {
        width: 100%;
    }
}

@media only screen and (min-width: 1200px) {
    .content {
        padding-top: 30px;
    }
}
.fix-a {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}
.fix-a a {
    margin-top: 14px;
}
</style>