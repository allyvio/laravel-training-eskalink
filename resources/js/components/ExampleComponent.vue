<template>
  <div>
    <!-- <badge-component :totalNotification="10"></badge-component> -->
    <button-component text="Primary" :type="'primary'"></button-component>
    <button-component text="Secondary" :type="'secondary'"></button-component>
    <button-component text="Warning" :type="'warning'"></button-component>
    <button-component text="Danger" type="danger"></button-component>
    <card-component content="I'm an example component."></card-component>
  </div>
</template>

<script>
import CardComponent from './CardComponent.vue';
import BadgeComponent from './BadgeComponent.vue';
import ButtonComponent from './ButtonComponent.vue';
export default {
  name: 'ExampleComponent',
  components: { CardComponent, BadgeComponent, ButtonComponent },
  mounted() {
    console.log('Component mounted.');
  },
};
</script>
