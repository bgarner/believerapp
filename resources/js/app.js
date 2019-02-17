
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import $ from 'jquery';
window.$ = window.jQuery = $;

require('bootstrap');
require('popper.js');
require('tooltip.js');
require('icheck');
require('jquery.nicescroll');
require('moment');
require('datatables');
require('sweetalert');
require('./stisla.js');
require('./scripts.js');
// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app'
// });

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(function () {
  $('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' /* optional */
  });
});

$(document).ready( function () {
  $('.datatable').DataTable();
} );


$(document).on("click", ".deleteClient", function() {
	console.log("client delete requested");
	var fileId = $(this).attr('data-item-id');
	var selector = "#client"+fileId;
	console.log("selector: " + selector);
    // e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "Are you sure you want to delete this client?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax({
              url: '/admin/clients/'+ fileId,
              type: 'DELETE',
              success: function(result) {
                  $(selector).closest('tr').fadeOut(1000);
                  swal("Client deleted!", {
                    icon: "success",
                  });
              }
          });
      } else {
        swal("Client is safe!");
      }
    });    
	return false; 
});