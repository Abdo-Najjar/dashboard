/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import vSelect from 'vue-select'
import * as VueGoogleMaps from 'vue2-google-maps'

// translation support
Vue.prototype.trans = (string, args) => {
    return window.translate(string, args);
};


//components

Vue.component('v-select', vSelect)
Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyD9wmTJeQspHyBabX7npNkHrbAN7fXshmo',
  },
})
Vue.component('dashboard-vue', require('./views/Dashboard.vue').default);
Vue.component('smart-decisions-vue', require('./views/SmartDecisions.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#content',
});
