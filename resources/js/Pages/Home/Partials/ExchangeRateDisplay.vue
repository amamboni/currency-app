<script setup lang="ts">
import { parseBigNumbers } from '@/utils/number'

interface Props {
    fromCurrency?: string
    toCurrency?: string
    rate?: number
}

const props = withDefaults(defineProps<Props>(), {
    fromCurrency: '',
    toCurrency: '',
    rate: undefined,
})
</script>

<template>
    <div>
        <template v-if="fromCurrency && toCurrency">
            <div class="p-3 bg-gray-100 rounded">
                <h3 class="text-lg">
                    1 <strong>{{ fromCurrency.toUpperCase() }}</strong> =
                    {{ parseBigNumbers(props.rate) }}
                    <strong>{{ toCurrency.toUpperCase() }}</strong>
                </h3>
            </div>
        </template>
    </div>
</template>
