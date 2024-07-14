<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/ApplicationContainer.vue";
import Pagination from "@/Components/ApplicationPagination.vue";

defineProps({
    category: { Type: Object },
});
</script>

<template>
    <AppLayout title="Categories">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{category.name}}
            </h2>
        </template>

        <Container>
            <div class="mb-5">
                
            </div>
        </Container>
    </AppLayout>
</template>
