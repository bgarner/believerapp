$(document).on("click", ".createManagerAccount", function() {
    // e.preventDefault();
    console.log("client edit requested");

    var formData = new FormData();

    //var brand_id = $('select.brand_select').find(':selected').data('clientid');
    var brand_id = $("#brand_select").val();
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();
    var confirm_email = $("#confirm_email").val();
    var password = $("#password").val();

    formData.append('brand_id', brand_id);
    formData.append('first_name', first_name);
    formData.append('last_name', last_name);
    formData.append('email', email);
    formData.append('password', password);

    $(this).html("Processing");
    $(this).prop('disabled', true);

    $.ajax({
        url: '/admin/manager',
        type: 'POST',
        //dataType: 'json',
        data: formData,
        success: function(result) {
            swal("Done!", "New Manager added!", "success")
            .then(function() {
                window.location = "/admin/clients";
            });
        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
});
