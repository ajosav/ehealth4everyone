/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { Form, HasError, AlertError } from 'vform';
import VueProgressBar from 'vue-progressbar';
import swal from 'sweetalert2';


import Gate from './AccessGates';

Vue.prototype.$gate = new Gate(window.user);

// Initializing vue form object
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);


// Initializing sweet alert 2
window.swal = swal;
const toast  = swal.mixin({
    toast: true,
    position:'top-end',
    showConfirmButton:false,
    timer:3000
});
window.toast = toast;


// binding data and using vueprogressbar
const options = {
    color:'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
}
Vue.use(VueProgressBar, options);

window.Fire = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('info-message', require('./components/Infos/info.vue').default);
Vue.component('info-failed', require('./components/Infos/failed.vue').default);
Vue.component('info-success', require('./components/Infos/success.vue').default);


Vue.component('all-departments', require('./components/departments/AllDepartments.vue').default);
Vue.component('book-appointment', require('./components/appointment/CreateAppointment.vue').default);
Vue.component('all-appointments', require('./components/appointment/AllAppointments.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
