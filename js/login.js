$(document).ready(function(){
    $("#show_pass").click(function(event) {
        event.preventDefault();
        var pass = $("#password");
        pass.attr("type", pass.attr("type") === "password" ? "text" : "password");
    });
});