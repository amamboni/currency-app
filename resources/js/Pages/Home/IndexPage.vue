<script setup lang="ts">
import PrimaryLayout from '@/Layouts/PrimaryLayout.vue'
import { Head } from '@inertiajs/vue3'
import CurrencyConversionDisplay from './Partials/CurrencyConversionDisplay.vue'
import CurrencyExchangeForm from './Partials/CurrencyExchangeForm.vue'
import ExchangeRateDisplay from './Partials/ExchangeRateDisplay.vue'

interface Props {
    currencies: Record<string, string>
    fromCurrency?: string
    toCurrency?: string
    rate?: number
}

withDefaults(defineProps<Props>(), {
    currencies: () => ({}),
    fromCurrency: '',
    toCurrency: '',
    rate: 0,
})
</script>

<template>
    <Head title="Welcome" />

    <PrimaryLayout>
        <div class="flex flex-col gap-4 max-w-4xl mx-auto">
            <CurrencyConversionDisplay
                :currencies="currencies"
                :from-currency="fromCurrency"
                :to-currency="toCurrency"
            />

            <div class="flex flex-col gap-4 bg-gray-200 px-6 py-8 rounded-2xl">
                <CurrencyExchangeForm
                    :currencies="currencies"
                    :from-currency="fromCurrency"
                    :to-currency="toCurrency"
                    :rate="rate"
                />

                <ExchangeRateDisplay
                    :currencies="currencies"
                    :from-currency="fromCurrency"
                    :to-currency="toCurrency"
                    :rate="rate"
                />
            </div>
        </div>
    </PrimaryLayout>
</template>
