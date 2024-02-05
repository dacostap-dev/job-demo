<script setup>
import { Head, Link } from "@inertiajs/vue3";

import Layout from "@/Layouts/Layout.vue";
// import FileInput from "@/Shared/FileInput";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
// import SelectInput from "@/Shared/SelectInput";

import { useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    title: "",
    description: "",
    company: "",
    salary: "",
});

const submit = () => {
    form.post("/jobs", {
        onFinish: () => form.reset(["title", "desc", "salary"]),
    });
};
</script>

<template>
    <div>
        <Layout>
            <Head title="Crear Trabajo" />
            <h1 class="mb-8 text-3xl font-bold">
                <Link class="text-indigo-400 hover:text-indigo-600" href="/jobs"
                    >Trabajos</Link
                >
                <span class="text-indigo-400 font-medium">/</span> Create
            </h1>
            <div
                class="max-w-3xlrounded-md shadow overflow-hidden bg-gray-50 border border-gray-100"
            >
                <form @submit.prevent="submit">
                    <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                        <TextInput
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.title"
                            placeholder="Título"
                            required
                            autofocus
                        />
                        <InputError class="mt-2" :message="form.errors.title" />

                        <TextInput
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.description"
                            placeholder="Descripción"
                            required
                            autofocus
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.description"
                        />

                        <TextInput
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.company"
                            placeholder="Compañía"
                            required
                            autofocus
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.company"
                        />

                        <TextInput
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.salary"
                            placeholder="S/. 3000"
                            required
                            autofocus
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.salary"
                        />

                        <!-- <file-input
                            v-model="form.photo"
                            :error="form.errors.photo"
                            class="pb-8 pr-6 w-full lg:w-1/2"
                            type="file"
                            accept="image/*"
                            label="Photo"
                        /> -->
                    </div>
                    <div class="flex items-center justify-end px-8 py-4">
                        <PrimaryButton
                            class="ms-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Create Use
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </Layout>
    </div>
</template>
