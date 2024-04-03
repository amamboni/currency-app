<script setup lang="ts">
const model = defineModel<string | number>()
</script>

<template>
    <input
        ref="input"
        v-model="model"
        class="border-gray-300 focus:border-gray-500 focus:ring-gray-500 rounded-md shadow-sm"
    />
</template>
