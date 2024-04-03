<script setup lang="ts">
import IconCurrencyExchange from '@/Icons/IconCurrencyExchange.vue'

const appName = import.meta.env.VITE_APP_NAME || 'Currency App'
</script>

<template>
    <div class="flex items-center gap-2">
        <IconCurrencyExchange class="w-8 h-8" />

        <h1 class="text-2xl font-bold">{{ appName }}</h1>
    </div>
</template>
