<script setup lang="ts">
interface Props {
    options: Record<string, string>
}

const model = defineModel<string>()

withDefaults(defineProps<Props>(), {
    options: () => ({}),
})
</script>

<template>
    <select
        v-model="model"
        class="text-xl font-bold border-gray-300 truncate focus:border-gray-500 focus:ring-gray-500 rounded-md shadow-sm"
    >
        <template v-for="(option, key) in options" :key="key">
            <option v-if="option" :value="key">
                {{ key === '' ? option : key.toUpperCase() }}
            </option>
        </template>
    </select>
</template>
