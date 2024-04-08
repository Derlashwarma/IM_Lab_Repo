    addEventListener('DOMContentLoaded',()=>{
        var regis_btn = document.getElementById("register");
        regis_btn.addEventListener('click',function(){
            document.getElementById("register_page").style.display = "flex";
        })
        var close_regis = document.getElementById("close_regis");
        close_regis.addEventListener('click',function(event){
            event.preventDefault(); 
            document.getElementById("register_page").style.display = "none";
        })

        var show = document.getElementById("show_pass");
        show.addEventListener('click',function(event){
            event.preventDefault();
            var pass = document.getElementById('password');
            if(pass.type == "password"){
                pass.type = "text";
            }
            else{
                pass.type = "password";
            }
        });
        var show_regis = document.getElementById("show_regis_pass");
        show_regis.addEventListener('click',function(event){
            event.preventDefault();
           var pass = document.getElementById("regis_pass");
           if(pass.type == "password"){
            pass.type = "text";
           }
           else{
            pass.type = "password";
           }
        });
    });