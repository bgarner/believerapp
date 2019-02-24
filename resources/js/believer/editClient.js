$(document).on("click", ".editClient", function() {
    // e.preventDefault();
    console.log("client edit requested");

    var formData = new FormData();

    var clientId = $("#client_id").val();
    var company_name = $("#name").val();
    var unique_name = $("#unique_name").val();
    var description = $("#description").val();
    var fileInput = document.getElementById('clientimage');
    var file = fileInput.files[0];
    var address1 = $("#address1").val();
    var address2 = $("#address2").val();
    var city = $("#city").val();
    var postal_code = $("#postal_code").val();
    var province = $("#province").val();
    var phone1 = $("#phone1").val();
    var phone2 = $("#phone2").val();

    formData.append('clientId', clientId);
    formData.append('company_name', company_name);
    formData.append('unique_name', unique_name);
    formData.append('description', description);
    formData.append('logo', file);
    formData.append('address1', address1);
    formData.append('address2', address2);
    formData.append('city', city);
    formData.append('postal_code', postal_code);
    formData.append('province', province);
    formData.append('phone1', phone1);
    formData.append('phone2', phone2);

    console.log(formData);

    $.ajax({
        url: '/admin/updateClient',
        type: 'POST',
        //dataType: 'json',
        data: formData,
        success: function(result) {
            swal("Done!", "Client info updated!", "success")
            .then(function() {
                window.location = "/admin/clients/" + result.id;
            });
        },
        cache: false,
        contentType: false,
        processData: false
    });
	return false;
});
