// $(document).ready( function () {
//     $('.datatable').DataTable();

//     "columnDefs": [
//         { "sortable": false, "targets": [2,3] }
//       ]
// } );


$(".datatable-rewards").dataTable({
    "columnDefs": [
      { "sortable": false, "targets": [1,2,4,5] }
    ]
});

$(".datatable-clients").dataTable({
    "columnDefs": [
      { "sortable": false, "targets": [5] }
    ]
});

$(".datatable-missions").dataTable({
    "columnDefs": [
      { "sortable": false, "targets": [5] }
    ]
});

$(".datatable-believers").dataTable({
    // "columnDefs": [
    //   { "sortable": false, "targets": [4] }
    // ]
});

$(".datatable-messages").dataTable({
    // "columnDefs": [
    //   { "sortable": false, "targets": [4] }
    // ]
});


$(".datatable-audiences").dataTable({
    "columnDefs": [
      { "sortable": false, "targets": [2] }
    ]
});

$(".datatable-redemptions").dataTable({
    "columnDefs": [
      { "sortable": false, "targets": [1] }
    ]
});



