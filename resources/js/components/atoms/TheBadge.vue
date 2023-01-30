<template>
    <span :class="`badge rounded-pill text-bg-${type}`">{{ text }}</span>
</template>
<script>
export default {
    props: {
        type: {
            type: String,
            default: 'primary'
        },
        text: {
            type: String,
            default: ''
        }
    }
}
</script>