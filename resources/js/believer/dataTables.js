// $(document).ready( function () {
//     $('.datatable').DataTable();

//     "columnDefs": [
//         { "sortable": false, "targets": [2,3] }
//       ]    
// } );


$(".datatable").dataTable({
    "columnDefs": [
      { "sortable": false, "targets": [1,2,5] }
    ]
});