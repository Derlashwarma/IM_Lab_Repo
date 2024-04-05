addEventListener('DOMContentLoaded',function(){
    
    var register_btn = document.getElementById("submit_registration");

    register_btn.addEventListener('click',function(event){
        var valid = true;
        var password2 = document.getElementById("regis_pass");
        var password = document.getElementById("regis_pass_conf");

        var firstname = document.getElementById("regis_first_name");
        var lastname = document.getElementById("regis_last_name");
        var selectElement = document.querySelector('.form-select[name="regis_gender"]');
        var email = document.getElementById("regis_email");
        var username = document.getElementById("regis_user_name");

        var inputs = [password2,password,firstname,lastname,selectElement,
        email,username];

        inputs.forEach(function(input){
            if(input.value === ""){
                input.style.borderColor = "red";
                valid = false;
            }
            else{
                input.style.borderColor = "";
            }
        });

        if(valid == false){
            document.getElementById("error_message").textContent = "Please enter valid input/s";
            event.preventDefault();
        }

        if(password.value !== password2.value){
            password.style.borderColor = "red";
            password2.style.borderColor = "red";
            document.getElementById("error_message").textContent = "Pasword does not match";
            event.preventDefault();
        }
    })
    
    document.getElementById("login").addEventListener('click',function(event){
        var username = document.getElementById("username");
        var password = document.getElementById("password");

        if(username.value === ""){
            username.style.borderColor = "red";
            event.preventDefault();
        }
        if(password.value === ""){
            password.style.borderColor = "red";
            event.preventDefault();
        }
        else{
            password.style.borderColor = "green";
            username.style.borderColor = "green";
        }
    });
    
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams.has("registration") && urlParams.get("registration") === 'failed'){
        document.getElementById("register_page").style.display = "flex";
        document.getElementById("error_message").textContent = "Email or username already taken";

        inputs.forEach(function(input){
            input.textContent = input.value;
        });
    }
    if(urlParams.has("registration") && urlParams.get("registration") === 'success'){
        document.getElementById("register_page").style.display = "flex";
        document.getElementById("error_message").textContent = "Registration successful";
        document.getElementById("error_message").classList.remove('text-danger');
        document.getElementById("error_message").style.color = "green";
    }

    if(urlParams.has("status") && urlParams.get("status") === 'failed'){
        document.getElementById("error_login").textContent = "Wrong username or password";
    }
});

// document.addEventListener('DOMContentLoaded',function(){
//     const urlParams = new URLSearchParams(window.location.search);
//     if(urlParams.has("registration") && urlParams.get("registration") === 'failed'){
//         document.getElementById("register_page").style.display = "flex";
//         document.getElementById("error_message").textContent = "Email or username already taken";
//     }
// });