<script setup>
import { Head, Link } from "@inertiajs/vue3";
import ShopLayout from "@/Layouts/ShopLayout.vue";
import ProductItem from "@/Components/ProductItem.vue";

defineProps({
    product: { Type: Object },
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
    <Head title="Product" />
    <div class="flex flex-col justify-between min-h-screen">
        <ShopLayout>
            <div
                class="pb-10 flex flex-col justify-center items-center md:flex-row md:items-start space-y-8 md:space-y-0 md:space-x-4 lg:space-x-8 max-w-6xl w-11/12 mx-auto"
            >
                <div
                    class="w-full md:w-1/2 max-w-md border border-palette-lighter bg-white rounded shadow-lg"
                >
                    <div class="relative h-96">
                        <div
                            style="
                                display: block;
                                overflow: hidden;
                                position: absolute;
                                inset: 0px;
                                box-sizing: border-box;
                                margin: 0px;
                            "
                        >
                            <img
                                alt="test-text"
                                :src="product.image_url"
                                class="transform duration-500 ease-in-out hover:scale-105"
                                style="
                                    position: absolute;
                                    inset: 0px;
                                    box-sizing: border-box;
                                    padding: 0px;
                                    border: none;
                                    margin: auto;
                                    display: block;
                                    width: 0px;
                                    height: 0px;
                                    min-width: 100%;
                                    max-width: 100%;
                                    min-height: 100%;
                                    max-height: 100%;
                                "
                            />
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-between h-full w-full md:w-1/2 max-w-xs mx-auto space-y-4 min-h-128"
                >
                    <Link
                        aria-label="back-to-products"
                        class="border border-palette-primary text-palette-primary text-lg font-primary font-semibold pt-2 pb-1 leading-relaxed flex justify-center items-center focus:ring-1 focus:ring-palette-light focus:outline-none w-full hover:bg-palette-lighter rounded-sm"
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
                        >Back to Shop</Link
                    >
                    <div class="font-primary">
                        <h1
                            class="leading-relaxed font-extrabold text-3xl text-palette-primary py-2 sm:py-4"
                        >
                            {{ product.name }}
                        </h1>
                        <p class="font-medium text-lg">
                            {{ product.description }}
                        </p>
                        <div
                            class="text-xl text-palette-primary font-medium py-4 px-1"
                        >
                            $<span class="text-2xl">{{ product.price }}</span>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="flex justify-start space-x-2 w-full">
                            <div
                                class="flex flex-col items-start space-y-1 flex-grow-0"
                            ></div>
                            <div
                                class="flex flex-col items-start space-y-1 flex-grow"
                            >
                                <Link
                                    :href="
                                        route('shop.checkout', {
                                            product: product.id,
                                        })
                                    "
                                    class="text-center bg-indigo-500 font-semibold hover:bg-palette-dark mt-2 pb-2 pt-3 rounded-sm text-white text-xl w-full"
                                    aria-label="cart-button"
                                >
                                    Quick Buy
                                </Link>
                            </div>
                        </div>
                        <button
                            class="pt-3 pb-2 bg-palette-primary text-white w-full mt-2 rounded-sm font-primary font-semibold text-xl flex justify-center items-baseline hover:bg-palette-dark"
                            aria-label="cart-button"
                        >
                            Add To Cart<svg
                                aria-hidden="true"
                                focusable="false"
                                data-prefix="fas"
                                data-icon="shopping-cart"
                                class="svg-inline--fa fa-shopping-cart fa-w-18 w-5 ml-2"
                                role="img"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 576 512"
                            >
                                <path
                                    fill="currentColor"
                                    d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"
                                ></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </ShopLayout>
    </div>
</template>
