$(document).on("click", ".uploadInvites", function() {
    // e.preventDefault();
    console.log("csv file upload requested");

    var formData = new FormData();

    var fileInput = document.getElementById('csvfile');
    var file = fileInput.files[0];

    formData.append('csvfile', file);
    formData.append('client_id', $("#client_id").val());
    formData.append('uploader_id', $("#uploader_id").val());

    console.log(formData);

    $.ajax({
        url: '/client/believers/invite',
        type: 'POST',
        //dataType: 'json',
        data: formData,
        success: function(result) {
            swal("Done!", "Your new believers will recieve their invites within 24 hours.", "success");
        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;

});
