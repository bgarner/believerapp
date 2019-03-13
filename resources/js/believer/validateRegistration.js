$(document).on("click", ".registerWithBrand", function() {

    var brand_id = $('#brand_id').val();
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var email = $('#email').val();
    var confirm_email = $('#confirm_email').val();
    var address1 = $('#address1').val();
    var city = $('#city').val();
    var province = $('#province').val();
    var postal_code = $('#postal_code').val();
    var password = $('#password').val();


    var request = $.ajax({
      url: "script.php",
      method: "POST",
      url: '/signup-brand',
      dataType: 'json',
      data: {
          brand_id: brand_id,
          first_name: first_name,
          last_name: last_name,
          email: email,
          confirm_email: confirm_email,
          address1: address1,
          city: city,
          province: province,
          postal_code: postal_code,
          password: password
      },
      statusCode: {
         200: function (response) {
            swal("Good job!", "You clicked the button!", "success");
         },

         400: function (response) {
            console.log(response.responseJSON);
            errorStr ="";
            $.each(response.responseJSON.errors, function(index, item) {
                errorStr += item[0] + "\n";
            });
            console.log(errorStr);

            swal("Oops!", errorStr, "error");
         }
      }
    });

    // request.statusCode: {
    //     404: function() {
    //       alert( "page not found" );
    //    }
    // }

    // request.done(function( msg ) {
    //     console.log("--- done ----");
    //   console.log(msg);
    // });

    // request.fail(function( jqXHR, textStatus ) {
    //     console.log("--- fail ----");
    //   console.log(textStatus);
    // });




    // $.ajax({
    //     method: 'POST',
    //     url: '/signup-brand',
    //     data: {
    //         brand_id: brand_id,
    //         first_name: first_name,
    //         last_name: last_name,
    //         email: email,
    //         confirm_email: confirm_email,
    //         address1: address1,
    //         city: city,
    //         province: province,
    //         postal_code: postal_code,
    //         password: password
    //     },

    //     processData: false,
    //     contentType: false,
    //     type: 'POST',
    //     fail: function(responseText) {
    //         console.log("----- error? -----");
    //         alert( responseText );
    //     },
    //     success: function(data) {
    //         console.log("----- in success -----");
    //         console.log(data);
    //         swal("Excellent!", "Thanks for signing up.", "success")
    //             .then(function() {
    //                 window.location = "/";
    //             });
    //     },
    //     done: function(request, status, error) {
    //         console.log("----- done -----");
    //         console.log(request.responseText);
    //         alert(request.responseText);
    //         //return false;
    //     },
    // });

});


