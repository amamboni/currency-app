<template>
    <div
        class="bg-white p-2 rounded grid grid-cols-5 gap-2 first-child:col-span-3 last-child:col-span-2 first-child:border-none last-child:border-none"
    >
        <slot name="input" />
        <slot name="addon" />
    </div>
</template>
