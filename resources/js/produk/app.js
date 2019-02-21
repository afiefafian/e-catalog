
require('../bootstrap');

window.Vue = require('vue');
window.swal = require('sweetalert2');

import VueRouter from 'vue-router';
import { routes } from './routes';
Vue.use(VueRouter);

Vue.filter('number_formatter', function (value) {
  if (!value) return ''
  formatted_val = value.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
  return formatted_val;
})

const router = new VueRouter({
    mode: 'history',
    routes
});

const app = new Vue({
  el: '#app',
  router
});
