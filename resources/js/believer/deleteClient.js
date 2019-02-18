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