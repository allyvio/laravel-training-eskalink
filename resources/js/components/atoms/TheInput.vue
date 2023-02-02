<template>
    <div class="form-floating mb-3">
        <input :type="type" v-model="valComputed" class="form-control" :placeholder="placeholder">
        <label>{{ label }}</label>
    </div>
</template>
<script>
export default {
    props: {
        placeholder: {
            type: String
        },
        type: {
            type: String,
            default: 'text'
        },
        label: {
            type: String
        },
        value: {
            type: String
        }
    },
    computed: {
        valComputed: {
            get() {
                return this.value
            },
            set(val) {
                this.$emit('input', val)
            }
        }
    },
}
</script>