import $ from 'jquery';
window.$ = window.jQuery = $;

//libraries...
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

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

//implementiations...
require('./believer/iCheck.js');
require('./believer/dataTables.js');
require('./believer/deleteClient.js');
require('./believer/editClient.js');
