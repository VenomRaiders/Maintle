<script setup>
import SuccessMessage from '@/Components/SuccessMessage.vue';
import StandardButton from '@/Components/StandardButton.vue';
const props = defineProps(['scripts'])

</script>

<template>
    <div id="info" class="flex justify-center items-center gap-10 h-full">
		<img src="/images/maintle-logo.png" alt="">
		<SuccessMessage>
			<b>Your submited first Script is under review. You'll receive an email confirmation if your script has been approved.
			Once Approved, you will be able to log in to your account and add more scripts!</b>
		</SuccessMessage>
		<StandardButton text="Logout" method="post" :isLink=true :href="route('logout')"></StandardButton>
    </div>

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