<script setup lang="ts">
import FooterSection from './Partials/FooterSection.vue'
import NavbarSection from './Partials/NavbarSection.vue'
</script>

<template>
    <div class="h-dvh flex flex-col px-5">
        <NavbarSection />

        <div class="flex-1 overflow-auto py-5">
            <slot />
        </div>

        <FooterSection />
    </div>
</template>
