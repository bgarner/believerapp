$(document).on("click", ".editClient", function() {
    console.log("client edit requested");
    var clientId = $("#client_id").val();
    var name = $("#name").val();
    var unique_name = $("#unique_name").val();
    var description = $("#description").val();
    var address1 = $("#address1").val();
    var address2 = $("#address2").val();
    var city = $("#city").val();
    var postal_code = $("#postal_code").val();
    var province = $("#province").val();
    var phone1 = $("#phone1").val();
    var phone2 = $("#phone2").val();
    // e.preventDefault();
    $.ajax({
        url: '/admin/clients/'+ clientId,
        type: 'PATCH',
        dataType: 'json',
        data: {
            name: name,
            unique_name: unique_name,
            description: description,
            logo: null,
            address1: address1,
            address2: address2,
            city: city,				
            postal_code: postal_code,
            province: province,
            phone1: phone1,
            phone2: phone2
        },        
        success: function(result) {
            swal("Done!", "Client info updated!", "success");
        }
    });  
	return false; 
});