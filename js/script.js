    $(document).ready(function(){

        var regis_btn = $("#register");
        regis_btn.click(function(){
            $("register_page").css("display","flex");
        })
        var close_regis = $("#close_regis");
        close_regis.click(function(event){
            event.preventDefault(); 
            $("#register_page").css("display","none");
        })

        var show = $("#show_pass");
        show.click(function(event){
            event.preventDefault();
            var pass = $("#password");
            if(pass.attr("type") == "password"){
                pass.attr("type", "text");
            }
            else{
                pass.attr("type", "password");
            }
        });

        var show_regis = $("#show_regis_pass");
        show_regis.click(function(event){
            event.preventDefault();
           var pass = $("#regis_pass");
           if(pass.attr("type") == "password"){
            pass.attr("type","text");
           }
           else{
            pass.attr("type","password");
           }
        });
    });