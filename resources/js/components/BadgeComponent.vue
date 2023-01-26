<template>
  <span class="badge badge-primary">
    {{ totalNotification }}
  </span>
</template>
<script>
export default {
  name: 'BadgeComponent',
  props: {
    totalNotification: {
      type: Number,
      default: 0,
    },
  },
};
</script>