$(document).on("click", ".deleteManagerAccount", function() {
    console.log("manager account delete requested");
    var accountId = $(this).attr('data-item-id');
    var selector = "#manageraccount"+accountId;
    console.log("selector: " + selector);
    // e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "Are you sure you want to delete this manager account?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax({
              url: '/admin/manager/'+ accountId,
              type: 'DELETE',
              success: function(result) {
                  $(selector).closest('tr').fadeOut(1000);
                  swal("Manager deleted!", {
                    icon: "success",
                  });
              }
          });
      } else {
        swal("Manager is safe!");
      }
    });
    return false;
});
