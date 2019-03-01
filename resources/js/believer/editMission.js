$(document).on("click", ".editMission", function() {
    // e.preventDefault();
    console.log("mission edit requested");

    var formData = new FormData();

    // var clientId = $("#client_id").val();
    // var company_name = $("#name").val();
    // var unique_name = $("#unique_name").val();
    // var description = $("#description").val();
    // var fileInput = document.getElementById('clientimage');
    // var missionimage = fileInput.files[0];
    // var address1 = $("#address1").val();
    // var address2 = $("#address2").val();
    // var city = $("#city").val();
    // var postal_code = $("#postal_code").val();
    // var province = $("#province").val();
    // var phone1 = $("#phone1").val();
    // var phone2 = $("#phone2").val();

    var fileInput = document.getElementById('missionimage');
    var file = fileInput.files[0];
    formData.append('missionId', $("#mission_id").val());
    formData.append('name', $("#name").val());
    formData.append('description', $("#description").val());
    formData.append('start', $("#start").val());
    formData.append('end', $("#end").val());
    formData.append('missionimage', file);
    //formData.append('points', $("#this").val());
    formData.append('challenge_type', $("#challenge_type").val());

    // formData.append('name', name);
    // formData.append('description', description);
    // formData.append('missionimage', fileInput.files[0]);
    // formData.append('start', start);
    // formData.append('end', end);
    // formData.append('brand_id', brand_id);
    // formData.append('created_by', created_by);
    // formData.append('is_draft', is_draft);
    // formData.append('points', points);
    // formData.append('challenge_type', challenge_type);

    console.log(formData);

    $.ajax({
        url: '/client/updateMission',
        type: 'POST',
        //dataType: 'json',
        data: formData,
        success: function(result) {
            swal("Done!", "Mission updated!", "success")
            .then(function() {
                window.location = "/client/missions/" + result.id;
            });
        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
});
