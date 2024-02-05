<script setup>
import { Link } from "@inertiajs/vue3";

import Logo from "@/Shared/Logo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import MainMenu from "@/Layouts/MainMenu.vue";
import FlashMessages from "@/Components/FlashMessages.vue";
</script>

<template>
    <div>
        <div id="dropdown" />
        <div class="md:flex md:flex-col">
            <div class="md:flex md:flex-col md:h-screen">
                <div class="md:flex md:flex-shrink-0">
                    <div
                        class="flex items-center justify-between px-6 py-4 bg-indigo-900 md:flex-shrink-0 md:justify-center md:w-56"
                    >
                        <Link class="mt-1" href="/">
                            <logo class="fill-white" width="120" height="28" />
                        </Link>
                        <dropdown class="md:hidden" placement="bottom-end">
                            <template #default>
                                <svg
                                    class="w-6 h-6 fill-white"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"
                                    />
                                </svg>
                            </template>
                            <template #dropdown>
                                <div
                                    class="mt-2 px-8 py-4 bg-indigo-800 rounded shadow-lg"
                                >
                                    <main-menu />
                                </div>
                            </template>
                        </dropdown>
                    </div>
                    <div
                        class="md:text-md flex items-center justify-between p-4 w-full text-sm bg-white border-b md:px-12 md:py-0"
                    >
                        <div class="mr-4 mt-1">Sabsa - App</div>
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <span class="inline-flex rounded-md">
                                    <button
                                        type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
                                    >
                                        {{ $page.props.auth.user.name }}

                                        <svg
                                            class="ms-2 -me-0.5 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <DropdownLink :href="route('profile.edit')">
                                    Profile
                                </DropdownLink>
                                <DropdownLink
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                >
                                    Log Out
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </div>
                </div>
                <div class="md:flex md:flex-grow md:overflow-hidden">
                    <MainMenu
                        class="hidden flex-shrink-0 p-8 w-56 bg-indigo-800 overflow-y-auto md:block"
                    />
                    <div
                        class="px-4 py-8 md:flex-1 md:p-12 md:overflow-y-auto"
                        scroll-region
                    >
                        <FlashMessages />
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
