<script setup>
defineProps({
    cardTitle: {
        type: String
    },
    statNumbers: {
        type: Number
    },
    statPercentage: {
        type: Number
    },
    icon: {
        type: String
    }
})
</script>

<template>
    <div class="card">
        <div class="card-details">
            <h1>{{ cardTitle }}</h1>
            <p>{{ statNumbers }}</p>
            <small><i class="fa-solid fa-arrow-up"></i> {{ statPercentage }}%</small>
        </div>
        <div class="icon">
            <i :class="icon"></i>
        </div>
    </div>
</template>

<style scoped>
.card {
    margin-bottom: 20px;
    color: var(--text-color);
    border: 1px solid var(--primary-color);
    border-radius: 5px;
    padding: 18px 15px;
    background: var(--primary-color);
    display: flex;
    justify-content: space-between;
}

.card > .card-details > h1 {
    font-weight: 500;
    font-size: 14px;
    color: rgba(245, 245, 245, 0.959);
    margin-bottom: 5px;
}

.card > .card-details > p {
    font-size: 24px;
    font-weight: bold;
}

.card > .card-details > small {
    color: rgb(0, 255, 0);
}

.card > .icon > i {
    font-size: 30px;
}

@media only screen and (min-width: 1200px) {
    .card {
        line-height: 30px;
        background: linear-gradient(120deg, var(--primary-color), var(--secondary-color));
    }
    .card > .card-details > h1 {
        font-size: 16px;
    }

    .card > .card-details > small {
        font-size: 14px;
    }

    .card > .card-details > p {
        font-size: 30px;
    }
}

</style>
