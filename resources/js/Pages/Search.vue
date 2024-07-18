<script setup>
import { Head, Link } from "@inertiajs/vue3";
import ShopLayout from "@/Layouts/ShopLayout.vue";
import ProductItem from "@/Components/ProductItem.vue";

defineProps({
    products: { Type: Array },
    query: { Type: String },
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Search" />
    <div class="flex flex-col justify-between min-h-screen">
        <ShopLayout>
            <div class="mx-auto max-w-6xl">
                <div class="">
                    <h1
                        class="leading-relaxed font-primary font-extrabold text-4xl text-center text-palette-primary mt-4 py-2 sm:py-4"
                    >
                        You Searced: {{ query }}
                    </h1>
                </div>
                <div
                    class="py-12 max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-8"
                >
                    <product-item
                        v-for="product in products"
                        :key="product.id"
                        :product="product"
                    />
                </div>
            </div>
        </ShopLayout>
    </div>
</template>
