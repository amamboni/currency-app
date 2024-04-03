<script setup lang="ts">
import PrimaryLayout from '@/Layouts/PrimaryLayout.vue'
import { Head } from '@inertiajs/vue3'
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
        <div class="flex flex-col gap-2">
            <div class="bg-gray-100 px-6 py-8 rounded-lg">
                <CurrencyExchangeForm
                    :currencies="currencies"
                    :from-currency="fromCurrency"
                    :to-currency="toCurrency"
                    :rate="rate"
                />
            </div>

            <ExchangeRateDisplay
                :from-currency="fromCurrency"
                :to-currency="toCurrency"
                :rate="rate"
            />
        </div>
    </PrimaryLayout>
</template>
