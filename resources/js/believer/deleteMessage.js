$(document).on("click", ".deleteMessage", function() {
    console.log("message delete requested");
    var messageId = $(this).attr('data-item-id');
    var selector = "#message"+messageId;
    console.log("selector: " + selector);
    // e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "Are you sure you want to delete this message?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          $.ajax({
              url: '/client/messages/'+ messageId,
              type: 'DELETE',
              success: function(result) {
                  $(selector).closest('tr').fadeOut(1000);
                  swal("Message deleted!", {
                    icon: "success",
                  });
              }
          });
      } else {
        swal("Message is safe!");
      }
    });
    return false;
});
