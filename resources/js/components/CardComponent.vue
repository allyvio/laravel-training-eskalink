<template>
  <div>
    <div class="card">
      <div class="card-body">
        <p
          class="paragraph"
          :style="{
            backgroundColor: 'blue',
            fontSize: '30px',
          }"
        >
          {{ content }}
        </p>
      </div>
    </div>
  </div>
</template>
<script>
import BadgeComponent from './BadgeComponent.vue';
export default {
  name: 'CardComponent',
  components: {
    BadgeComponent,
  },
  props: {
    content: {
      type: String,
      default: '',
    },
  },
};
</script>
<style scoped>
p {
  color: blue;
}
.paragraph {
  background-color: red;
  color: white;
  padding: 5px;
}
span {
  color: aquamarine !important;
}
</style>