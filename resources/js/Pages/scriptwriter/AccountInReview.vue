<script setup>
import HomePageLayoutVue from "@/Layouts/HomePageLayout.vue";
const props = defineProps(['scripts'])

</script>

<template>
	<HomePageLayoutVue tab-header="First script under review">
		<div id="info" class="flex justify-center items-center gap-10 h-full">
			<p class="p-4 my-2 text-lg text-primary bg-green-100 rounded-lg">
				<b>Your submited first Script is under review. You'll receive an email confirmation if your script has been approved.
				Once Approved, you will be able to log in to your account and add more scripts!</b>
			</p>
		</div>
	</HomePageLayoutVue>
</template>

<style scoped>

#info img {
	height: 100px;
}

@media screen and (max-width: 690px)  {
	#info {
		flex-direction: column;
	}
}

</style>