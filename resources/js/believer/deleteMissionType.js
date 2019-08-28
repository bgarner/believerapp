$(document).on("click", ".deleteMissionType", function() {
    console.log("mission type delete requested");
    var fileId = $(this).attr('data-item-id');
    var selector = "#missionType"+fileId;
    console.log("selector: " + selector);
    // e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "Are you sure you want to delete this Mission Type?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax({
              url: '/admin/missiontypes/'+ fileId,
              type: 'DELETE',
              success: function(result) {
                  $(selector).closest('tr').fadeOut(1000);
                  swal("Mission Type deleted!", {
                    icon: "success",
                  });
              }
          });
      } else {
        swal("Mission Type is safe!");
      }
    });
    return false;
});
