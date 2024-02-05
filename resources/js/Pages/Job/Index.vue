<script setup>
import Icon from "@/Shared/Icon.vue";
import Layout from "@/Layouts/Layout.vue";
import Pagination from "@/Components/Pagination.vue";
import { Link } from "@inertiajs/vue3";

import { Head } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    jobs: {
        type: Object,
    },
});
</script>

<template>
    <Head title="Trabajos" />

    <Layout>
        <div>
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-bold">Trabajos</h1>

                <Link
                    v-if="
                        $page.props.auth.user.permissions.includes(
                            'create:jobs'
                        )
                    "
                    class="px-6 py-3 rounded bg-indigo-600 text-white text-sm leading-4 font-bold whitespace-nowrap hover:bg-orange-400 focus:bg-orange-400"
                    href="/jobs/create"
                >
                    <span>Crear</span>
                    <span class="hidden md:inline">&nbsp;Trabajo</span>
                </Link>
            </div>
            <div class="bg-white rounded-md shadow overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <tr class="text-left font-bold">
                        <th class="pb-4 pt-6 px-6">Título</th>
                        <th class="pb-4 pt-6 px-6">Descripción</th>
                        <th class="pb-4 pt-6 px-6">Compañia</th>
                        <th class="pb-4 pt-6 px-6">Salario</th>
                        <th class="pb-4 pt-6 px-6">Acciones</th>
                    </tr>
                    <tr
                        v-for="job in jobs.data"
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
                        <td class="border-t max-w-28">
                            <div
                                class="flex items-center px-6 py-4"
                                tabindex="-1"
                            >
                                <p class="truncate">
                                    {{ job.description }}
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
                            <p class="truncate">
                                {{ job.salary }}
                            </p>
                        </td>
                        <td class="w-px border-t">
                            <div class="flex">
                                <Link
                                    v-if="
                                        $page.props.auth.user.permissions.includes(
                                            'create:apply'
                                        )
                                    "
                                    class="flex items-center px-4"
                                    :href="`/apply/${job.id}`"
                                    tabindex="-1"
                                >
                                    <button
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                    >
                                        Postular
                                    </button>
                                </Link>

                                <Link
                                    v-if="
                                        $page.props.auth.user.permissions.includes(
                                            'show:detail:jobs'
                                        )
                                    "
                                    class="flex items-center px-4"
                                    :href="`/jobs/${job.id}`"
                                    tabindex="-1"
                                >
                                    <button
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                    >
                                        Ver
                                    </button>
                                </Link>
                            </div>
                        </td>
                    </tr>
                    <tr v-if="jobs.length === 0">
                        <td class="px-6 py-4 border-t" colspan="4">
                            No hay trabajos.
                        </td>
                    </tr>
                </table>
            </div>

            <Pagination class="mt-6" :links="jobs.links" />
        </div>
    </Layout>
</template>
