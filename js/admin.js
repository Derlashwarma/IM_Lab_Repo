$(document).ready(function(){
    $(".dashboard_container").css("display","none");
    
    $(".dashboard").click(function(){
        $(".users_container").css("display","none");
        $(".dashboard_container").css("display","flex");
        $(".user_class").removeClass("text-dark");
        $(".dashboard_class").addClass("text-dark");
    });
    
    $(".users").click(function(){
        $(".users_container").css("display","flex");
        $(".dashboard_container").css("display","none");
        $(".dashboard_class").removeClass("text-dark");
        $(".user_class").addClass("text-dark");
    });

    const ctx = document.getElementById('postLikesChart').getContext('2d');
});