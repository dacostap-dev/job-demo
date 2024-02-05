<script setup>
import { Head, Link } from "@inertiajs/vue3";

import Layout from "@/Layouts/Layout.vue";
// import FileInput from "@/Shared/FileInput";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
// import SelectInput from "@/Shared/SelectInput";

import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    job: {
        type: Object,
    },
});

console.log(props.job);

const form = useForm({
    title: props.job.title,
    description: props.job.description,
    company: props.job.company,
    salary: props.job.salary.toString(),
});
</script>

<template>
    <div>
        <Layout>
            <Head title="Crear Trabajo" />
            <h1 class="mb-8 text-3xl font-bold">
                <Link class="text-indigo-400 hover:text-indigo-600" href="/jobs"
                    >Trabajos</Link
                >
                <span class="text-indigo-400 font-medium">/</span>
                {{ job.title }}
            </h1>
            <div
                class="max-w-3xlrounded-md shadow bg-gray-50 border border-gray-100"
            >
                <div class="flex flex-wrap p-8">
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
                    <InputError class="mt-2" :message="form.errors.company" />

                    <TextInput
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.salary"
                        placeholder="S/. 3000"
                        required
                        autofocus
                    />
                    <InputError class="mt-2" :message="form.errors.salary" />
                </div>
            </div>

            <div class="bg-white rounded-md shadow overflow-x-auto mt-10">
                <h2 class="mb-8 text-xl font-bold">Postulantes</h2>

                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="pb-4 pt-6 px-6">Nombre</th>
                        <th class="pb-4 pt-6 px-6">Email</th>
                        <th class="pb-4 pt-6 px-6">Fecha de Registro</th>
                    </tr>
                    <tr
                        v-for="apply in job.applies"
                        :key="apply.id"
                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                    >
                        <td class="border-t max-w-32">
                            <div
                                class="flex items-center px-6 py-4 focus:text-indigo-500"
                            >
                                <p class="truncate">
                                    {{ apply.user.name }}
                                </p>
                            </div>
                        </td>

                        <td class="border-t">
                            <div
                                class="flex items-center px-6 py-4"
                                tabindex="-1"
                            >
                                <p class="truncate">
                                    {{ apply.user.email }}
                                </p>
                            </div>
                        </td>
                        <td class="border-t">
                            <div
                                class="flex items-center px-6 py-4"
                                tabindex="-1"
                            >
                                <p class="truncate">
                                    {{ apply.created_at }}
                                </p>
                            </div>
                        </td>
                    </tr>
                    <tr v-if="job.applies.length === 0">
                        <td class="px-6 py-4 border-t" colspan="4">
                            No tienes postulaciones.
                        </td>
                    </tr>
                </table>
            </div>
        </Layout>
    </div>
</template>
