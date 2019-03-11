function validateRegistrationForm(){

    var first_name = document.forms["registration_form"]["first_name"].value;
    var last_name = document.forms["registration_form"]["last_name"].value;
    var email = document.forms["registration_form"]["email"].value;
    var confirm_email = document.forms["registration_form"]["confirm_email"].value;
    var address1 = document.forms["registration_form"]["address1"].value;
    var city = document.forms["registration_form"]["city"].value;
    var province = document.forms["registration_form"]["province"].value;
    var postal_code = document.forms["registration_form"]["postal_code"].value;
    var password = document.forms["registration_form"]["password"].value;

    var msg = ""

    if(!first_name || !last_name || !email || !confirm_email || !address1 || !city || !province || !postal_code || !password){
        msg ="Oops, looks like you missed somthing...\n";
    }

    if (first_name == "") {
      msg = +"Please enter your first name.\n";
      return false;
    }
    if(last_name == ""){
        msg = +"Please enter your last name. \n";
        return false;
    }
    if(email == ""){
        msg = +"Please enter your email address. \n";
        return false;
    }
    if(confirm_email == ""){
        msg = +"Please confirm your email address. \n";
        return false;
    }
    if(address1 == ""){
        msg = +"Please enter your address. \n";
        return false;
    }
    if(city == ""){
        msg = +"Please enter your city. \n";
        return false;
    }
    if(province == ""){
        msg = +"Please enter your province or state. \n";
        return false;
    }
    if(postal_code == ""){
        msg = +"Please enter your postal or zip code. \n";
        return false;
    }
    if(password == ""){
        msg = +"Please enter your password. \n";
        return false;
    }
    if(email !== confirm_email){
        msg = +"Please make sure you correctly confirmed your email address. \n";
        return false;
    }

    if(msg != ""){
        alert(msg);
        return false;
    } else{
        alert("looks good");
    }


}
