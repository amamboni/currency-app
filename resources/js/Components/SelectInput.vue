<script setup lang="ts">
import { computed } from 'vue'

interface Props {
    options: Record<string, string>
}

const model = defineModel<string>()

const props = withDefaults(defineProps<Props>(), {
    options: () => ({ '': 'Select Currency' }),
})

const options = computed(() => ({ '': 'Select Currency', ...props.options }))
</script>

<template>
    <select
        v-model="model"
        class="border-gray-300 focus:border-gray-500 focus:ring-gray-500 rounded-md shadow-sm"
    >
        <template v-for="(option, key) in options" :key="key">
            <option :value="key">
                {{ option || key }}
            </option>
        </template>
    </select>
</template>
