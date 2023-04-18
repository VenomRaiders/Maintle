<script setup>
import AdminDashboardLayout from "@/Layouts/AdminDashboardLayout.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <AdminDashboardLayout>
        <div class="content">
            <div class="tab-buttons">
                <Link
                    :href="route('admin.all_scripts')"
                    :class="{
                        active: $page.url.startsWith('/admin/scriptwriters/all_scripts'),
                    }"
                    as="button"
                    class="btn"
                    > All Scripts
                </Link>
                <Link
                    :href="route('admin.scripts_pending')"
                    :class="{
                        active: $page.url.startsWith('/admin/scriptwriters/pending'),
                    }"
                    as="button"
                    class="btn"
                    > Pending
                </Link>
                <Link
                    :href="route('admin.scripts_approved')"
                    :class="{
                        active: $page.url.startsWith('/admin/scriptwriters/approved'),
                    }"
                    as="button"
                    class="btn"
                    > Approved
                </Link>
                <Link
                    :href="route('admin.scripts_rejected')"
                    :class="{
                        active: $page.url.startsWith('/admin/scriptwriters/rejected'),
                    }"
                    as="button"
                    class="btn"
                    > Rejected
                </Link>
            </div>
            <div class="scripts-container">
                <slot />
            </div>
        </div>
    </AdminDashboardLayout>
</template>

<style scoped>
/* Default styling is for mobile */
.tab-buttons {
    display: flex;
}

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
