/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import vSelect from 'vue-select'
import * as VueGoogleMaps from 'vue2-google-maps'
import VueApexCharts from 'vue-apexcharts'

// translation support
Vue.prototype.trans = (string, args) => {
  return window.translate(string, args);
};

// charts
Vue.use(VueApexCharts)
Vue.component('apexchart', VueApexCharts)



//google maps icons for markers
Vue.prototype.icon = function () {
  return '/markers/marker1.png';
}

// Vue.prototype.orangeIcon = function () {
//   return '/markers/marker4.png';
// }

// Vue.prototype.cyanIcon = function () {
//   return '/markers/marker4.png';
// }

// Vue.prototype.purpleIcon = function () {
//   return '/markers/marker4.png';
// }

Vue.component('v-select', vSelect)
Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyD9wmTJeQspHyBabX7npNkHrbAN7fXshmo',
  },
})
Vue.component('dashboard-vue', require('./views/Dashboard.vue').default);
Vue.component('smart-decisions-vue', require('./views/SmartDecisions.vue').default);

// country
Vue.component('create-country-vue', require('./views/countries/create.vue').default);

// commen 
Vue.component('widget', require('./components/Widget.vue').default);
Vue.component('icon', require('./components/Icon.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#content',
});
