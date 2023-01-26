<template>
  <button :class="`btn btn-${type}`" type="button">{{ text }}</button>
</template>
<script>
export default {
  name: 'ButtonComponent',
  props: {
    text: {
      type: String,
      default: 'Button',
    },
    type: {
      type: String,
      default: 'primary',
    },
  },
};
</script>