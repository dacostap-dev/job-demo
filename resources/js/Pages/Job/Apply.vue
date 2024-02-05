<script setup>
import { Head, Link } from "@inertiajs/vue3";

import Layout from "@/Layouts/Layout.vue";
import FileInput from "@/Components/FileInput.vue";
import InputError from "@/Components/InputError.vue";

import { useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
    job: {
        type: Object,
    },
});

const form = useForm({
    cv: null,
    comment: "",
});

const submit = () => {
    form.post(
        `/jobs/${props.job.id}/apply`,
        {
            onFinish: () => form.reset("cv"),
        },
        { forceFormData: true }
    );
};
</script>

<template>
    <div>
        <Layout>
            <Head title="Crear Trabajo" />
            <h1 class="mb-8 text-3xl font-bold">
                <Link class="text-indigo-400 hover:text-indigo-600" href="/jobs"
                    >Trabajos
                </Link>
                <span class="text-indigo-400 font-medium">/</span>
                {{ job.title }}
            </h1>
            <div
                class="max-w-3xlrounded-md shadow overflow-hidden bg-gray-50 border border-gray-100"
            >
                <form @submit.prevent="submit">
                    <div class="flex flex-col space-y-8 -mb-8 -mr-6 p-8">
                        <div class="">
                            <textarea
                                v-model="form.comment"
                                ref="input"
                                rows="4"
                                class="mt-1 block w-full lg:w-1/2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                placeholder="Escribe un mensaje"
                            ></textarea>
                            <InputError
                                class="mt-2"
                                :message="form.errors.comment"
                            />
                        </div>

                        <div class="">
                            <FileInput
                                v-model="form.cv"
                                class="pr-6 w-full lg:w-1/2"
                                type="file"
                                accept="pdf/*"
                                label="CV"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.cv"
                            />
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-8 py-4">
                        <PrimaryButton
                            class="ms-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Postular
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </Layout>
    </div>
</template>
