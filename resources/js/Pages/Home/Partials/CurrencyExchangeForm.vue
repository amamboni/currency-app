<script setup lang="ts">
import CurrencyInput from '@/Components/CurrencyInput.vue'
import { parseBigNumbers } from '@/utils/number'
import { useForm } from '@inertiajs/vue3'
import { ref, watch } from 'vue'

interface Props {
    currencies: Record<string, string>
    fromCurrency?: string
    toCurrency?: string
    rate?: number
}

const props = withDefaults(defineProps<Props>(), {
    currencies: () => ({}),
    fromCurrency: '',
    toCurrency: '',
    rate: 0,
})

type Form = {
    fromCurrency: string
    toCurrency: string
}

const form = useForm<Form>({
    fromCurrency: props.fromCurrency,
    toCurrency: props.toCurrency,
})

const fromValue = ref<number | string | undefined>()
const toValue = ref<number | string | undefined>()
const updatedCurrency = ref<'toCurrency' | 'fromCurrency' | undefined>()

/**
 * Submit form and make a get request
 */
const submitForm = () => {
    form.get(
        route('home.index', {
            fromCurrency: form.fromCurrency,
            toCurrency: form.toCurrency,
        }),
        {
            onSuccess() {
                if (updatedCurrency.value === 'fromCurrency') {
                    setFromValue()
                }

                if (updatedCurrency.value === 'toCurrency') {
                    setToValue()
                }
            },
            preserveState: true,
            preserveScroll: true,
        }
    )
}

watch(
    () => form.fromCurrency,
    () => {
        updatedCurrency.value = 'fromCurrency'
        submitForm()
    }
)

watch(
    () => form.toCurrency,
    () => {
        updatedCurrency.value = 'toCurrency'
        submitForm()
    }
)

/**
 * Handle on change of toValue
 */
const onToValueChange = () => {
    setFromValue()
}

/**
 * Handle on change of fromValue
 */
const onFromValueChange = () => {
    setToValue()
}

/**
 * Set the value of toValue
 */
const setToValue = () => {
    const result = form.toCurrency && fromValue.value ? +fromValue.value * props.rate : undefined
    toValue.value = parseBigNumbers(result)
}

/**
 * Set the value of fromValue
 */
const setFromValue = () => {
    const result = form.fromCurrency && toValue.value ? +toValue.value / props.rate : undefined
    fromValue.value = parseBigNumbers(result)
}
</script>

<template>
    <div class="flex justify-center">
        <div class="flex flex-col gap-4">
            <CurrencyInput
                v-model:value="fromValue"
                v-model:currency="form.fromCurrency"
                :options="currencies"
                @change="onFromValueChange"
            />

            <CurrencyInput
                v-model:value="toValue"
                v-model:currency="form.toCurrency"
                :options="currencies"
                @change="onToValueChange"
            />
        </div>
    </div>
</template>
