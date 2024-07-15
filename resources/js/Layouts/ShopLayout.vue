<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <header class="border-b border-palette-lighter sticky top-0 z-20 bg-white">
        <div
            class="flex items-center justify-between mx-auto max-w-6xl px-6 pb-2 pt-4 md:pt-6"
        >
            <Link href="/" class="cursor-pointer"
                ><h1 class="flex no-underline items-center">
                    <img
                        height="32"
                        width="32"
                        alt="logo"
                        class="h-12 w-12 mr-1 object-contain"
                        src="/assets/images/logo.png"
                    /><span
                        class="text-xl font-primary font-bold tracking-tight pt-1"
                        >NextGen Bazaar</span
                    >
                </h1></Link
            >
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Settings Dropdown -->
                <div class="ms-3 relative" v-if="$page.props.auth.user">
                    Dashboard
                </div>
                <div v-else>
                    <Link :href="route('register')"> Regsiter </Link> |
                    <Link :href="route('login')"> Login </Link>
                </div>
            </div>
        </div>
    </header>

    <main>
        <slot />
    </main>
</template>
