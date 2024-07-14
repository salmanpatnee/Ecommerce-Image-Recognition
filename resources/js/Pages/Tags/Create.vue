<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Container from "@/Components/ApplicationContainer.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3"
import { computed } from "vue";

const props = defineProps({
    tag: { type: Object, required: false, default: '' }
})
const form = useForm({
    name: props.tag.name
});

const editMode = computed(() => !!props.tag.id)
const submit = () => {

    if (!editMode.value) {
        form.post(route('tags.store'));
    } else {
        form.put(route('tags.update', { id: props.tag.id }));
    }
}


</script>

<template>
    <AppLayout title="Add a Tag">


        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ editMode ? 'Update' : 'Add' }} Tag
            </h2>
        </template>


        <Container>
            <div class="flex flex-col items-center  pt-6 ">
                <div class="mb-5 w-full sm:max-w-md">
                    <form @submit.prevent="submit">
                        <div>
                            <TextInput id="name" class="w-full" v-model="form.name" placeholder="Tag name" />
                            <InputError :message="form.errors.name" class="mt-1" />
                        </div>
                        <div class="mt-3">
                            <PrimaryButton class="me-3" type="submit">{{ editMode ? 'Update' : 'Add' }} </PrimaryButton>

                        </div>
                    </form>
                </div>
            </div>

        </Container>
    </AppLayout>
</template>
