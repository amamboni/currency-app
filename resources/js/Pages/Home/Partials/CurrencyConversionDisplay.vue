<script setup lang="ts">
interface Props {
    currencies?: Record<string, string>
    fromCurrency?: string
    toCurrency?: string
}

const props = withDefaults(defineProps<Props>(), {
    currencies: () => ({}),
    fromCurrency: '',
    toCurrency: '',
})

/**
 * Get the currency label from currencies
 */
const getCurrencyLabel = (currency: string) => props.currencies?.[currency]
</script>

<template>
    <div>
        <template v-if="fromCurrency && toCurrency">
            <h3 class="text-lg">
                Converting <strong>{{ getCurrencyLabel(fromCurrency) }}</strong> to
                <strong>{{ getCurrencyLabel(toCurrency) }}</strong>
            </h3>
        </template>
    </div>
</template>
