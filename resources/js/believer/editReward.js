$(document).on("click", ".editReward", function() {
    // e.preventDefault();
    console.log("reward edit requested");

    var formData = new FormData();

    //var rewardId = $("#reward_id").val();
    var title = $("#title").val();
    var points = $("#points").val();
    var description = $("#description").val();
    var fileInput = document.getElementById('rewardimage');
    var file = fileInput.files[0];

    formData.append('rewardId', $("#reward_id").val());
    formData.append('title', title);
    formData.append('points', points);
    formData.append('description', description);
    formData.append('image', file);

    console.log(formData);

    $.ajax({
        url: '/admin/updateReward',
        type: 'POST',
        //dataType: 'json',
        data: formData,
        success: function(result) {
            swal("Done!", "Reward info updated!", "success")
            .then(function() {
                window.location = "/admin/rewards/" + result.id;
            });
        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
});
