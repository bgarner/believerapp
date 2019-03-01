import $ from 'jquery';
window.$ = window.jQuery = $;

//libraries...
require('bootstrap');
require('popper.js');
require('tooltip.js');
require('icheck');
require('jquery.nicescroll');
require('moment');
require('datatables.net');
require('sweetalert');
require('daterangepicker');
require('./stisla.js');
require('./scripts.js');

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

// Daterangepicker


  $('#mission_create_daterange').daterangepicker({
    drops: 'down',
    opens: 'right'
  }, function(start, end, label) {
    $('#start').val( start.format('YYYY-MM-DD') + ' 00:00:00');
    $('#end').val( end.format('YYYY-MM-DD') + ' 23:59:59');
  });


// if(jQuery().daterangepicker) {
//   if($(".datepicker").length) {
//     $('.datepicker').daterangepicker({
//       locale: {format: 'MMMM D, YYYY'},
//       singleDatePicker: true,
//       showDropdowns: true,
//     });
//   }
//   if($(".datetimepicker").length) {
//     $('.datetimepicker').daterangepicker({
//       locale: {format: 'YYYY-MM-DD hh:mm'},
//       singleDatePicker: true,
//       timePicker: true,
//       timePicker24Hour: true,
//     });
//   }
//   if($(".daterange").length) {
//     $('.daterange').daterangepicker({
//       locale: {format: 'YYYY-MM-DD'},
//       drops: 'down',
//       opens: 'right'
//     }, function(start, end, label) {
//         console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
//     });
//   }
// }

//implementiations...
require('./believer/iCheck.js');
require('./believer/dataTables.bs4.js');
require('./believer/dataTables.js');
// clients
require('./believer/deleteClient.js');
require('./believer/editClient.js');
require('./believer/editMission.js');
// rewards
require('./believer/deleteReward.js');
require('./believer/editReward.js');
require('./believer/rewardPublishing.js');
//missions
require('./believer/deleteMission.js');
