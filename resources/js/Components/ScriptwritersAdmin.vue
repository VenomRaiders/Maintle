<script setup>
import AdminDashboardLayout from "@/Layouts/AdminDashboardLayout.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <AdminDashboardLayout>
        <div class="content">
            <div class="scripts-container">
                <slot />
            </div>
        </div>
    </AdminDashboardLayout>
</template>

<style scoped>
/* Default styling is for mobile */

.btn {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 43px;
  color: var(--text-color);
  background-color: var(--primary-color);
  padding: 10px;
  border-radius: 5px;
  font-size: 15px;
  border-left: 2px solid var(--border-color);
  width: 100%;
  border-radius: 0px;
  transition: 0.3s;
  font-size: 13px;
}

.content {
    /* margin-top: 10px; */
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
    flex-direction: column;
    gap: 20px;
    flex-wrap: wrap;
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
