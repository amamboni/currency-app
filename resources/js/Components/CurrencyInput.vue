<script setup lang="ts">
import { sortObjectValues } from '@/utils/object'
import { computed } from 'vue'
import AddonInput from './AddonInput.vue'
import SelectInput from './SelectInput.vue'
import TextInput from './TextInput.vue'

interface Props {
    options: Record<string, string>
}

const props = withDefaults(defineProps<Props>(), {
    options: () => ({}),
})

interface Emits {
    (e: 'change', value?: string | number): void
}

const emit = defineEmits<Emits>()

const value = defineModel<number | string>('value')
const currency = defineModel<string>('currency')

const options = computed(() => ({
    '': 'Select',
    ...sortObjectValues(props.options),
}))

/**
 * Handle on input of value
 */
const onValueInput = () => {
    emit('change', value.value)
}
</script>

<template>
    <AddonInput>
        <template #input>
            <TextInput v-model="value" type="number" placeholder="0.00" @input="onValueInput" />
        </template>

        <template #addon>
            <SelectInput v-model="currency" :options="options" />
        </template>
    </AddonInput>
</template>
