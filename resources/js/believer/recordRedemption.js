$(document).on("click", ".markAsRedeemed", function() {
    console.log("reward redemption");
    var fileId = $(this).attr('data-item-id');
    var selector = "#redemption"+fileId;
    console.log("selector: " + selector);

    var formData = new FormData();
    formData.append('id', fileId);

    // e.preventDefault();
    $.ajax({
        url: '/admin/redemption/record',
        type: 'POST',
        data: formData,
        success: function(result) {
          swal("Done!", "Reward redemption recorded!", "success")
          .then(function() {
              $(this).removeClass('notRedeemed');
              $(this).addClass('redeemed');
              location.reload(true);
          });
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;
});
