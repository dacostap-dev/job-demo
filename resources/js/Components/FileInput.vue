<template>
    <div>
        <label v-if="label" class="form-label">{{ label }}:</label>
        <div
            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        >
            <input
                ref="file"
                type="file"
                :accept="accept"
                class="hidden"
                @change="change"
            />
            <div v-if="!modelValue" class="p-2">
                <button
                    type="button"
                    class="px-4 py-1 text-white text-xs font-medium bg-gray-500 hover:bg-gray-700 rounded-sm"
                    @click="browse"
                >
                    Buscar
                </button>
            </div>
            <div v-else class="flex items-center justify-between p-2">
                <div class="flex-1 pr-1">
                    {{ modelValue.name }}
                    <span class="text-gray-500 text-xs"
                        >({{ filesize(modelValue.size) }})</span
                    >
                </div>
                <button
                    type="button"
                    class="px-4 py-1 text-white text-xs font-medium bg-gray-500 hover:bg-gray-700 rounded-sm"
                    @click="remove"
                >
                    Eliminar
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        modelValue: File,
        label: String,
        accept: String,
    },
    emits: ["update:modelValue"],
    watch: {
        modelValue(value) {
            if (!value) {
                this.$refs.file.value = "";
            }
        },
    },
    methods: {
        filesize(size) {
            var i = Math.floor(Math.log(size) / Math.log(1024));
            return (
                (size / Math.pow(1024, i)).toFixed(2) * 1 +
                " " +
                ["B", "kB", "MB", "GB", "TB"][i]
            );
        },
        browse() {
            this.$refs.file.click();
        },
        change(e) {
            this.$emit("update:modelValue", e.target.files[0]);
        },
        remove() {
            this.$emit("update:modelValue", null);
        },
    },
};
</script>
