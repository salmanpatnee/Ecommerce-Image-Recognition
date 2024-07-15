<script setup>
import { Head, Link } from "@inertiajs/vue3";
import ShopLayout from "@/Layouts/ShopLayout.vue";

defineProps({
    product: { Type: Object },
});
</script>

<template>
    <Head title="Checkout" />
    <div class="flex flex-col justify-between min-h-screen">
        <ShopLayout>
            <div class="container mx-auto mb-20 min-h-screen">
                <h1
                    class="leading-relaxed font-primary font-extrabold text-4xl text-center text-palette-primary mt-4 py-2 sm:py-4"
                >
                    Thank You for Purchasing
                </h1>
                <div class="min-h-20 max-w-2xl my-4 sm:my-8 mx-auto w-full">
                    <table class="mx-auto">
                        <thead>
                            <tr
                                class="uppercase text-xs sm:text-sm text-palette-primary border-b border-palette-light"
                            >
                                <th class="font-primary font-bold px-6 py-4">
                                    Product
                                </th>
                                <th
                                    class="font-primary font-bold px-6 py-4 hidden sm:table-cell"
                                >
                                    Price
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-palette-lighter">
                            <tr>
                                <th class="font-primary font-normal px-6 py-4">
                                    {{ product.name }}
                                </th>
                                <th class="font-primary font-normal px-6 py-4">
                                    {{ product.price }}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="max-w-sm mx-auto space-y-4 px-2">
                    <Link
                        aria-label="back-to-products"
                        class="bg-indigo-500 border border-palette-primary text-white text-lg font-primary font-semibold pt-2 pb-1 leading-relaxed flex justify-center items-center focus:ring-1 focus:ring-palette-light focus:outline-none w-full hover:bg-palette-lighter rounded-sm"
                        href="/"
                        ><svg
                            aria-hidden="true"
                            focusable="false"
                            data-prefix="fas"
                            data-icon="arrow-left"
                            class="svg-inline--fa fa-arrow-left fa-w-14 w-4 mr-2 inline-flex"
                            role="img"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"
                        >
                            <path
                                fill="currentColor"
                                d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"
                            ></path></svg
                        >Back To Shop</Link
                    >
                </div>
            </div>
        </ShopLayout>
    </div>
</template>
