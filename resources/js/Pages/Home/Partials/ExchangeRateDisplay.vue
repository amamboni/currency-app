<script setup lang="ts">
interface Props {
    fromCurrency?: string
    toCurrency?: string
    rate?: number
}

withDefaults(defineProps<Props>(), {
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
                    1 <strong>{{ fromCurrency.toUpperCase() }}</strong> = {{ rate }}
                    <strong>{{ toCurrency.toUpperCase() }}</strong>
                </h3>
            </div>
        </template>
    </div>
</template>
