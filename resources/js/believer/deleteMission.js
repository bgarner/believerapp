$(document).on("click", ".deleteMission", function() {
    console.log("mission delete requested");
    var fileId = $(this).attr('data-item-id');
    var selector = "#mission"+fileId;
    console.log("selector: " + selector);
    // e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "Are you sure you want to delete this mission?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax({
              url: '/client/missions/'+ fileId,
              type: 'DELETE',
              success: function(result) {
                  $(selector).closest('tr').fadeOut(1000);
                  swal("Mission deleted!", {
                    icon: "success",
                  });
              }
          });
      } else {
        swal("Mission is safe!");
      }
    });
    return false;
});
