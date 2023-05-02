<script setup>
import { Head, Link } from "@inertiajs/vue3"
import HomePageLayout from "@/Layouts/HomePageLayout.vue";


</script>

<template>
    <Head title="Home"/>
    <HomePageLayout toggle-class="homepage">
        <div class="main-screen">
            <h1 class="h">Welcome to the maintle</h1>
            <div class="main-screen-items">
                <p class="sp">Professional Script writers and scripts available</p>
                <p class="mission-statement">A marketing platform for scriptwriters where potential film-makers purchase meaningful scripts for their movies</p>
            </div>
        </div>

        <section id="utils">
            <Link :href="route('register.investor')">Be an Investor</Link>
            <Link :href="route('register.scriptwritter')">For Scriptwriters</Link>
        </section>

        <section id="utils-2">
            <Link :href="route('scripts')" >Scripts Gallery</Link>
        </section>
    </HomePageLayout>
    
</template>

<style scoped>



.main-screen {
    background-color: #010101a8;
    border-radius: 5px;
    padding: 25px;
    margin-top: 90px;
    color: white;
}

h1, .sp {
    text-transform: uppercase;
    font-weight: bold;
    font-family: 'Montserrat', sans-serif;
}

.main-screen .h {
    margin-bottom: 20px;
    margin-top: 10px;
    text-align: center;
    /* font-family: 'Loki Cola' */ 
    /* this was a requested font by Mr Nganje. I've left kept in the project just should in case */
}

.main-screen-items p {
    display: flex;
    flex-direction: column;
}

.mission-statement {
    font-family: 'Montserrat Alternates', sans-serif;
    font-size: 15px;
    color: whitesmoke;
    margin-top: 20px;
}

#utils a, #utils-2 a {
    /* background: linear-gradient(120deg,
        var(--alternate-color),
        var(--hues-2)
    ); */
    background: var(--primary-color);
    border-radius: 5px;
    padding: 12px;
    color: var(--text-color);
    display: flex;
    justify-content: center;
    align-items: center;
}

#utils {
    display: flex;
    flex-direction: column;
    padding: 5px;
    justify-content: flex-start;
}

#utils a {
    width: fit-content;
    align-self: flex-end;
    margin-top: 10px;
}

#utils-2 {
    background-color: #010101a8;
    border-radius: 5px;
    padding: 40px;
    width: fit-content;
}


#utils a:hover, #utils-2 a:hover {
    background: var(--alternate-color);
}

.sp {
    color: var(--alternate-color);
    font-size: 15px;
}

/* Scaling for desktop */

@media only screen and (min-width: 735px) {
    .main-screen h1 {
        font-size: 25px;
    }
    .main-screen .sp {
        font-size: 17   px;
    }
}

@media only screen and (min-width: 1100px) {
    .main-screen {
        display: flex;
    }

    .main-screen h1 {
        width: 90%;
        font-size: 40px;
    }

    .main-screen-items .sp {
        font-size: 18px;
    }
}
</style>