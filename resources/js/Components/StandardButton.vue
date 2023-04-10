<script setup>
import { Link } from "@inertiajs/vue3"
defineProps({
  text: {
    type: String,
  }, 
  bgColor: {
    type: String,
    default: "var(--primary-color)"
  },
  isLink: {
    type: Boolean,
    default: false
  },
  href: {
    type: String,
    default: "#"
  }
});
</script>

<template>
    <button v-if="!isLink" class="btn">{{ text }}</button>
    <Link v-else :href="href" class="bg-primary text-white p-2 rounded-md">{{ text }}</Link>
</template>

<style scoped>
.btn {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 43px;
  color: var(--text-color);
  background-color: v-bind("bgColor");
  padding: 10px;
  border-radius: 5px;
  font-size: 15px;
}

.btn:hover, a:hover {
  background-color: var(--secondary-color);
  transition:  0.2s;
}
</style>