<script setup>
import { Link } from "@inertiajs/vue3";
import Icon from "@/Shared/Icon.vue";
import NavLink from "@/Components/NavLink.vue";
</script>

<template>
    <div>
        <div class="mb-4">
            <NavLink
                :href="route('dashboard')"
                :active="route().current('dashboard')"
                class="group"
            >
                <icon
                    name="dashboard"
                    class="mr-2 w-4 h-4"
                    :class="
                        route().current('dashboard')
                            ? 'fill-white'
                            : 'fill-white/75 group-hover:fill-white'
                    "
                />
                Dashboard
            </NavLink>
        </div>
        <div class="mb-4">
            <NavLink
                :href="route('jobs.index')"
                :active="route().current('jobs.index')"
                class="group"
            >
                <icon
                    name="office"
                    class="mr-2 w-4 h-4"
                    :class="
                        route().current('jobs.index')
                            ? 'fill-white'
                            : 'fill-white/75 group-hover:fill-white'
                    "
                />
                Trabajos
            </NavLink>
        </div>
        <div
            class="mb-4"
            v-if="$page.props.auth.user.permissions.includes('show:apply')"
        >
            <NavLink
                :href="route('apply.index')"
                :active="route().current('apply.index')"
                class="group"
            >
                <icon
                    name="office"
                    class="mr-2 w-4 h-4"
                    :class="
                        route().current('applies')
                            ? 'fill-white'
                            : 'fill-white/75 group-hover:fill-white'
                    "
                />
                Mis Postulaciones
            </NavLink>
        </div>
    </div>
</template>
