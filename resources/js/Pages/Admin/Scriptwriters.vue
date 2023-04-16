<script setup>
import AdminDashboardLayout from "@/Layouts/AdminDashboardLayout.vue";
import StandardButton from "@/Components/StandardButton.vue";
</script>

<template>
    <AdminDashboardLayout>
        <div class="content">
            <div class="tab-buttons">
                <StandardButton 
                    text="All Scripts"

                    :class="{
                        active: $page.url.startsWith('/admin/scriptwriters')
                    }"
                />
                <StandardButton text="Pending" />
                <StandardButton text="Approved" />
                <StandardButton text="Rejected" />
            </div>
            <div class="scripts-container">
                <div class="card">
                    <img src="/images/image.jpg" alt="script image">
                    <div class="card-body">
                        <h1>Hello world some text</h1>
                        <p>Download script</p>
                        Approve script
                    </div>
                </div>

                <div class="card">
                    <img src="/images/image.jpg" alt="script image">
                    <div class="card-body">
                        <h1>Hello world some text</h1>
                        <p>Download script</p>
                        Approve script
                    </div>
                </div>

                <div class="card">
                    <img src="/images/image.jpg" alt="script image">
                    <div class="card-body">
                        <h1>Hello world some text</h1>
                        <p>Download script</p>
                        Approve script
                    </div>
                </div>

                <div class="card">
                    <img src="/images/image.jpg" alt="script image">
                    <div class="card-body">
                        <h1>Hello world some text</h1>
                        <p>Download script</p>
                        Approve script
                    </div>
                </div>

                <div class="card">
                    <img src="/images/image.jpg" alt="script image">
                    <div class="card-body">
                        <h1>Hello world some text</h1>
                        <p>Download script</p>
                        Approve script
                    </div>
                </div>
            </div>
        </div>
    </AdminDashboardLayout>
</template>

<style scoped>
/* Default styling is for mobile */
.tab-buttons {
    display: flex;
}

.tab-buttons .btn {
    width: 100%;
    border-radius: 0px;
    background-color: var(--primary-color);
    border-left: 2px solid var(--border-color);
    transition: 0.3s;
}

.tab-buttons .btn:nth-child(1) {
    background-color: var(--alternate-background-color);
    color: black;
    border: 1px solid var(--border-color);
}

.tab-buttons .btn:hover {
    margin-top: -5px;
}

.content {
    margin-top: 20px;
    margin-bottom: 20px;
}

.active {
    margin-top: -5px;
    background-color: var(--alternate-background-color);
    color: black;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
}

.scripts-container {
    margin-top: 40px;
    /* border: 1px solid red; */
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.card img {
    width: 100%;
    height: 250px;
    background-size: fit;
}
.scripts-container .card {
    flex-grow: 1;
    max-height: 400px;
    border: 1px solid var(--border-color);
    overflow: auto;
}
/* Scaling for desktop devices */

@media only screen and (min-width: 690px) {

}

@media only screen and (min-width: 1200px) {
    .content {
        padding-top: 10px;
    }
}
</style>
