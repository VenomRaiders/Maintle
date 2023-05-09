<script setup>
import { Head } from "@inertiajs/vue3";
import HomePageLayoutVue from "@/Layouts/HomePageLayout.vue";
</script>

<template>
    <Head title="Scripts" />

    <HomePageLayoutVue tab-header="About Us">
        <div class="scripts-container">
            <section>
                <h1>Who Are we?</h1>
                <p>
                    Maintle is an innovative digital solution by Top Spot Group Ltd. It is an innovative way of linking the
                    stakeholders of the African film and entertainment industry. A place where you can buy/sell scripts,
                    invest in projects and source for talents.
                </p>
            </section>
            <section>
                <h1>What do we offer?</h1>
                <p>
                    Meet producers, invest in lucrative projects, cash out of the growing African film and entertainment
                    market. Maintle has made it possible to access a variety of choices with just a few clicks.
                </p>
            </section>
        </div>
    </HomePageLayoutVue>
</template>

<style scoped>
/* Mobile first styling */
.scripts-container {
    padding: 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    gap: 30px;
    line-height: 30px;
}

h1 {
    font-family: "Montserrat", sans-serif;
    font-size: 25px;
    font-weight: bold;
    padding-bottom: 10px;
}
</style>
