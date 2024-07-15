<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/ApplicationContainer.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";
import { computed } from "vue";

const props = defineProps({
    product: { type: Object, required: false, default: "" },
    categories: { type: Object, required: true },
});
const form = useForm({
    name: props.product.name,
    price: props.product.price,
    category_id: props.product.category_id || "",
    image: props.product.image || null,
    description: props.product.description,
});

const editMode = computed(() => !!props.product.id);

const handleFileChange = (event) => {
    console.log(event.target.files[0]);
    // console.log(form);
};

const submit = () => {
    if (!editMode.value) {
        form.post(route("products.store"));
    } else {
        form.put(route("products.update", { id: props.product.id }));
    }
};
</script>

<template>
    <AppLayout title="Add a Product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ editMode ? "Update" : "Add" }} Product
            </h2>
        </template>

        <Container>
            <div class="flex flex-col items-center pt-6">
                <div class="mb-5 w-full sm:max-w-md">
                    <form @submit.prevent="submit">
                        <div>
                            <TextInput
                                id="name"
                                class="w-full mb-4"
                                v-model="form.name"
                                placeholder="Product name"
                            />
                            <InputError
                                :message="form.errors.name"
                                class="mt-1"
                            />
                        </div>
                        <div>
                            <TextInput
                                id="price"
                                type="number"
                                class="w-full mb-4"
                                v-model="form.price"
                                placeholder="Product price"
                            />
                            <InputError
                                :message="form.errors.price"
                                class="mt-1"
                            />
                        </div>
                        <div>
                            <select
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mb-4"
                                placeholder="Category"
                                name="category_id"
                                id="category_id"
                                v-model="form.category_id"
                            >
                                <option value="">Select Category</option>
                                <option
                                    v-for="category in categories"
                                    :key="category.id"
                                    :value="category.id"
                                >
                                    {{ category.name }}
                                </option>
                            </select>
                            <InputError
                                :message="form.errors.category_id"
                                class="mt-1"
                            />
                        </div>
                        <div v-if="!product">
                            <TextInput
                                @input="form.image = $event.target.files[0]"
                                id="image"
                                type="file"
                                class="w-full mb-4 bg-white p-1"
                                placeholder="Product image"
                            />
                            <div v-if="props.product.image">
                                <img
                                    :src="`/storage/${props.product.image}`"
                                    alt="Product Image"
                                    class="w-full h-auto mt-2"
                                />
                            </div>
                            <!-- <progress
                                v-if="form.progress"
                                :value="form.progress.percentage"
                                max="100"
                            >
                                {{ form.progress.percentage }}%
                            </progress> -->
                            <InputError
                                :message="form.errors.image"
                                class="mt-1"
                            />
                        </div>
                        <div>
                            <textarea
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                id="description"
                                name="description"
                                placeholder="product description"
                                v-model="form.description"
                            ></textarea>
                            <InputError
                                :message="form.errors.description"
                                class="mt-1"
                            />
                        </div>
                        <div class="mt-3">
                            <PrimaryButton class="me-3" type="submit"
                                >{{ editMode ? "Update" : "Add" }}
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </Container>
    </AppLayout>
</template>
