$(document).ready(function() {
    var inputs = [
        $("#regis_pass"),
        $("#regis_pass_conf"),
        $("#regis_first_name"),
        $("#regis_last_name"),
        $(".form-select[name='regis_gender']"),
        $("#regis_email"),
        $("#regis_user_name")
    ];

    $("#submit_registration").click(function(event) {
        var valid = true;
        var inputs = [
            $("#regis_pass"),
            $("#regis_pass_conf"),
            $("#regis_first_name"),
            $("#regis_last_name"),
            $(".form-select[name='regis_gender']"),
            $("#regis_email"),
            $("#regis_user_name")
        ];

        inputs.forEach(function(input) {
            if (input.val() == "") {
                input.css("borderColor", "red");
                valid = false;
            } else {
                input.css("borderColor", "");
            }
        });
        

        var password = inputs[0].val();
        var password2 = inputs[1].val();
        if (password !== password2) {
            $("#regis_pass, #regis_pass_conf").css("borderColor", "red");
            $("#error_message").text("Password does not match");
        }
        if(!valid){
            $("#error_message").text("Please input following fields");
            event.preventDefault();
        }

    });
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has("registration") && urlParams.get("registration") === 'failed') {
        $("#register_page").css("display", "flex");
        $("#error_message").text("Registration failed");
        inputs.forEach(function(input) {
            input.val(input.val());
        });
    }
    if (urlParams.has("registration") && urlParams.get("registration") === 'success') {
        $("#register_page").css("display", "flex");
        $("#error_message").text("Registration successful");
        $("#error_message").removeClass("text-danger");
        $("#error_message").css("color", "green");
    }
});

$(document).ready(function(){
    $("#login").click(function(event) {
        var username = $("#username");
        var password = $("#password");

        if (username.val() === "") {
            username.css("borderColor", "red");
            event.preventDefault();
        }

        if (password.val() === "") {
            password.css("borderColor", "red");
            event.preventDefault();
        } else {
            password.css("borderColor", "green");
            username.css("borderColor", "green");
        }
    });
})

$(document).ready(function(event){
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has("status") && urlParams.get("status") === 'failed') {
        $("#error_login").text("Wrong username or password");
        event.preventDefault();
    }
});