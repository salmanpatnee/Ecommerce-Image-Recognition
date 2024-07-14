<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/ApplicationContainer.vue";
import Pagination from "@/Components/ApplicationPagination.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    categories: { Type: Array },
});
</script>

<template>
    <AppLayout title="Categories">
        <template #header>
            <div class="flex flex-wrap items-center justify-between">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Categories
                </h2>
                <Link :href="route('categories.create')"
                    class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button">Add New Category</Link>
            </div>
        </template>

        <Container>

            <section class="py-1 bg-blueGray-50">
                <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4 mx-auto mt-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">


                        <div class="block w-full overflow-x-auto">
                            <table class="items-center bg-transparent w-full border-collapse ">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Category Name
                                        </th>
                                        <th
                                            class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                            Action
                                        </th>


                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="category in categories.data" :key="category.id">
                                        <th
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0  whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                            {{ category.name }}
                                        </th>
                                        <td
                                            class="text-center border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                            <Link :href="route('categories.edit', { id: category.id })"
                                                class="border-blue-500 text-blue-500">Edit
                                            </Link>


                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <Pagination :meta="categories.meta" />
                    </div>
                </div>
            </section>



        </Container>
    </AppLayout>
</template>
