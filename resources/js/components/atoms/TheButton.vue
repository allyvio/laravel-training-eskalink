<template>
    <button :class="['btn', `btn-${type}`, !floating || 'bottom-right', !circle || 'rounded-circle']"
        v-bind="{ 'data-bs-toggle': !modal || 'modal', 'data-bs-target': target}" type="button">
        <slot />
    </button>
</template>
<script>
export default {
    name: 'ButtonComponent',
    props: {
        text: {
            type: String,
            default: '',
        },
        type: {
            type: String,
            default: 'primary',
        },
        modal: {
            type: Boolean,
            default: false
        },
        target: {
            type: String,
            default: ''
        },
        floating: {
            type: Boolean,
            default: false
        },
        circle: {
            type: Boolean,
            default: false
        },
        icon: {
            type: String,
            default: ''
        },
    },
};
</script>
<style scoped>
.bottom-right {
    position: fixed;
    right: 10px;
    bottom: 10px;
}
</style>