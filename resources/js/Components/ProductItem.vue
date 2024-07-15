<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    product: { type: Object, required: true },
});
</script>
<template>
    <Link
        class="h-120 w-72 rounded shadow-lg mx-auto border border-palette-lighter"
        :href="route('shop.product.show', { product: product.id })"
        ><div class="h-72 border-b-2 border-palette-lighter relative">
            <div
                style="
                    display: block;
                    overflow: hidden;
                    position: absolute;
                    top: 0;
                    left: 0;
                    bottom: 0;
                    right: 0;
                    box-sizing: border-box;
                    margin: 0;
                "
            >
                <img
                    alt="test-text"
                    :src="product.image_url"
                    class="transform duration-500 ease-in-out hover:scale-110"
                    style="
                        position: absolute;
                        top: 0;
                        left: 0;
                        bottom: 0;
                        right: 0;
                        box-sizing: border-box;
                        padding: 0;
                        border: none;
                        margin: auto;
                        display: block;
                        width: 0;
                        height: 0;
                        min-width: 100%;
                        max-width: 100%;
                        min-height: 100%;
                        max-height: 100%;
                    "
                    sizes="100vw"
                />
            </div>
        </div>
        <div class="h-48 relative px-4">
            <div
                class="font-primary text-palette-primary text-2xl pt-4 px-4 font-semibold text-center"
            >
                {{ product.name }}
            </div>

            <div class="font-medium mb-4 mt-3 text-center">
                $<span class="text-lg">{{ product.price }}</span>
            </div>

            <Link
                :href="route('shop.checkout', { product: product.id })"
                class="block text-center bg-indigo-500 font-semibold hover:bg-palette-dark mt-2 pb-2 pt-3 rounded-sm text-white text-xl w-full"
                aria-label="cart-button"
            >
                Quick Buy
            </Link>
        </div></Link
    >
</template>
