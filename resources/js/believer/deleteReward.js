$(document).on("click", ".deleteReward", function() {
	console.log("reward delete requested");
	var fileId = $(this).attr('data-item-id');
	var selector = "#reward"+fileId;
	console.log("selector: " + selector);
    // e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "Are you sure you want to delete this reward?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax({
              url: '/admin/rewards/'+ fileId,
              type: 'DELETE',
              success: function(result) {
                  $(selector).closest('tr').fadeOut(1000);
                  swal("Reward deleted!", {
                    icon: "success",
                  });
              }
          });
      } else {
        swal("Reward is safe!");
      }
    });    
	return false; 
});