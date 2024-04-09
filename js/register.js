$(document).ready(function() {
    $("#show_regis_pass").click(function(event) {
        event.preventDefault();
        var pass = $("#regis_pass");
        pass.attr("type", pass.attr("type") === "password" ? "text" : "password");
    });

    $("#show_regis_pass_2").click(function(event) {
        event.preventDefault();
        var confirm = $("#regis_pass_conf");
        confirm.attr("type", confirm.attr("type") === "password" ? "text" : "password");
    });

    $("#register").click(function(event) {
        event.preventDefault();
        $("#register_page").css("display", "flex");
    });

    $("#close_regis").click(function(event) {
        event.preventDefault();
        $("#register_page").css("display", "none");
    });
});

$(document).ready(function(){ 
    var regis_btn = $("#register");
    regis_btn.click(function(event){
        event.preventDefault(); 
        $("#register_page").css("display","flex");
        });
    var close_regis = $("#close_regis");
    close_regis.click(function(event){
        event.preventDefault(); 
        $("#register_page").css("display","none");
    });
});