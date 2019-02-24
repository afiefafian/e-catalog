
require('../bootstrap');

window.Vue = require('vue');
window.swal = require('sweetalert2');

import VueRouter from 'vue-router';
import { routes } from './routes';
Vue.use(VueRouter);

Vue.filter('number_formatter', function (value) {
  if (!value) return ''
  var formatted_val = value.toFixed().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  return formatted_val;
})

Vue.filter('str_substring', function (val, from, to, addstr) {

  if (val.length <= (to)){
    return val;
  } else {
    var formatted_val = val.substring(from, to) + addstr;
    return formatted_val;
  }
})

const router = new VueRouter({
    mode: 'history',
    routes
});

const app = new Vue({
  el: '#app',
  router
});
