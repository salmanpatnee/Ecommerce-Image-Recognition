<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/ApplicationContainer.vue";
import Pagination from "@/Components/ApplicationPagination.vue";
import dayjs from "dayjs";

const humanFriendlyDate = (timestamp) =>
    dayjs(timestamp).format("MMMM D, YYYY h:mm A");

defineProps({
    activities: { Type: Array },
});
</script>

<template>
    <AppLayout title="Activities">
        <template #header>
            <div class="flex flex-wrap items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Activities
                </h2>
            </div>
        </template>

        <Container>
            <section class="py-1 bg-blueGray-50">
                <div class="w-full xl:w-10/12 mb-12 xl:mb-0 px-4 mx-auto mt-4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
                    >
                        <div class="block w-full overflow-x-auto">
                            <table
                                class="items-center bg-transparent w-full border-collapse"
                            >
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                        >
                                            User
                                        </th>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                        >
                                            Product
                                        </th>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                        >
                                            Type
                                        </th>
                                        <th
                                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                        >
                                            Search Query
                                        </th>
                                        <th
                                            class="text-center px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                        >
                                            Date
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr
                                        v-for="activity in activities.data"
                                        :key="activity.id"
                                    >
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 whitespace-nowrap p-4 text-left text-blueGray-700"
                                        >
                                            {{ activity.user }}
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 whitespace-nowrap p-4 text-left text-blueGray-700"
                                        >
                                            <span>{{
                                                activity.product?.name
                                            }}</span>
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 whitespace-nowrap p-4 text-left text-blueGray-700"
                                        >
                                            <span
                                                class="flex items-center"
                                                v-if="
                                                    activity.type === 'search'
                                                "
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="me-2 size-6 text-blue-500"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                                                    />
                                                </svg>
                                            </span>
                                            <span
                                                class="flex items-center"
                                                v-if="activity.type === 'view'"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="me-2 size-6 text-blue-500"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                                                    />
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                                    /></svg
                                            ></span>
                                            <span
                                                class="flex items-center"
                                                v-if="
                                                    activity.type === 'purchase'
                                                "
                                                ><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="me-2 size-6 text-blue-500"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"
                                                    />
                                                </svg>
                                            </span>
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 whitespace-nowrap p-4 text-left text-blueGray-700"
                                        >
                                            {{ activity.search_for }}
                                        </td>
                                        <td
                                            class="text-center border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                        >
                                            {{
                                                humanFriendlyDate(
                                                    activity.created_at
                                                )
                                            }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Pagination :meta="activities.meta" />
                    </div>
                </div>
            </section>
        </Container>
    </AppLayout>
</template>
