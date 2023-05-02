<script setup>
import { Head, router } from "@inertiajs/vue3";
import HomePageLayoutVue from "@/Layouts/HomePageLayout.vue";
</script>

<template>
    <Head title="Scripts" />

    <HomePageLayoutVue tab-header="About Us">
        <div class="scripts-container">
            <section>
                <h1>Who Are we?</h1>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Excepturi, ab laudantium! Eos, quos laboriosam! Rerum,
                    nesciunt debitis omnis consectetur quisquam sint natus
                    quibusdam facere eos repellat tenetur commodi, aliquam
                    tempore.
                </p>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Excepturi, ab laudantium! Eos, quos laboriosam! Rerum,
                    nesciunt debitis omnis consectetur quisquam sint natus
                    quibusdam facere eos repellat tenetur commodi, aliquam
                    tempore.
                </p>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Excepturi, ab laudantium! Eos, quos laboriosam! Rerum,
                    nesciunt debitis omnis consectetur quisquam sint natus
                    quibusdam facere eos repellat tenetur commodi, aliquam
                    tempore.
                </p>
            </section>
            <section>
                <h1>What do we offer?</h1>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Excepturi, ab laudantium! Eos, quos laboriosam! Rerum,
                    nesciunt debitis omnis consectetur quisquam sint natus
                    quibusdam facere eos repellat tenetur commodi, aliquam
                    tempore.
                </p>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Excepturi, ab laudantium! Eos, quos laboriosam! Rerum,
                    nesciunt debitis omnis consectetur quisquam sint natus
                    quibusdam facere eos repellat tenetur commodi, aliquam
                    tempore.
                </p>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Excepturi, ab laudantium! Eos, quos laboriosam! Rerum,
                    nesciunt debitis omnis consectetur quisquam sint natus
                    quibusdam facere eos repellat tenetur commodi, aliquam
                    tempore.
                </p>
            </section>
            <section>
                <h1>Learn More!</h1>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Excepturi, ab laudantium! Eos, quos laboriosam! Rerum,
                    nesciunt debitis omnis consectetur quisquam sint natus
                    quibusdam facere eos repellat tenetur commodi, aliquam
                    tempore.
                </p>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Excepturi, ab laudantium! Eos, quos laboriosam! Rerum,
                    nesciunt debitis omnis consectetur quisquam sint natus
                    quibusdam facere eos repellat tenetur commodi, aliquam
                    tempore.
                </p>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Excepturi, ab laudantium! Eos, quos laboriosam! Rerum,
                    nesciunt debitis omnis consectetur quisquam sint natus
                    quibusdam facere eos repellat tenetur commodi, aliquam
                    tempore.
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
