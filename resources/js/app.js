import './bootstrap';
import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('b-badge', require('./components/BadgeComponent.vue').default);
Vue.component('b-card', require('./components/CardComponent.vue').default);
Vue.component('b-navbar', require('./components/NavbarComponent.vue').default);

Vue.use(VueRouter)
const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
