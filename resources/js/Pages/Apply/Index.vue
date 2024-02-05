<script setup>
import Layout from "@/Layouts/Layout.vue";
import Pagination from "@/Components/Pagination.vue";

import { Head } from "@inertiajs/vue3";

defineProps({
    applies: {
        type: Object,
    },
});
</script>

<template>
    <Head title="Mis Postulaciones" />

    <Layout>
        <div>
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-bold">Mis Postulaciones</h1>
            </div>
            <div class="bg-white rounded-md shadow overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="pb-4 pt-6 px-6">Título</th>
                        <th class="pb-4 pt-6 px-6">Compañia</th>
                        <th class="pb-4 pt-6 px-6">Salario</th>
                        <th class="pb-4 pt-6 px-6">Mensaje</th>
                    </tr>
                    <tr
                        v-for="job in applies.data"
                        :key="job.id"
                        class="hover:bg-gray-100 focus-within:bg-gray-100"
                    >
                        <td class="border-t max-w-32">
                            <div
                                class="flex items-center px-6 py-4 focus:text-indigo-500"
                            >
                                <p class="truncate">
                                    {{ job.title }}
                                </p>
                            </div>
                        </td>

                        <td class="border-t">
                            <div
                                class="flex items-center px-6 py-4"
                                tabindex="-1"
                            >
                                <p class="truncate">
                                    {{ job.company }}
                                </p>
                            </div>
                        </td>
                        <td class="border-t">
                            <div
                                class="flex items-center px-6 py-4"
                                tabindex="-1"
                            >
                                <p class="truncate">
                                    {{ job.salary }}
                                </p>
                            </div>
                        </td>
                        <td class="border-t max-w-28">
                            <div
                                class="flex items-center px-6 py-4"
                                tabindex="-1"
                            >
                                <p class="truncate">
                                    {{ job.message }}
                                </p>
                            </div>
                        </td>
                    </tr>
                    <tr v-if="applies.length === 0">
                        <td class="px-6 py-4 border-t" colspan="4">
                            No tienes postulaciones.
                        </td>
                    </tr>
                </table>
            </div>

            <Pagination class="mt-6" :links="applies.links" />
        </div>
    </Layout>
</template>
