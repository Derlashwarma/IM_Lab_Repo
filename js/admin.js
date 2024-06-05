$(document).ready(function(){
    $(".dashboard_container").css("display","none");
    
    $(".dashboard").click(function(){
        $(".users_container").css("display","none");
        $(".statistics_container").css("display","none");
        $(".dashboard_container").css("display","flex");
        $(".user_class").removeClass("text-dark");
        $(".statistics_class").removeClass("text-dark");
        $(".dashboard_class").addClass("text-dark");
    });
    
    $(".users").click(function(){
        $(".users_container").css("display","flex");
        $(".dashboard_container").css("display","none");
        $(".statistics_container").css("display","none");
        $(".dashboard_class").removeClass("text-dark");
        $(".statistics_class").removeClass("text-dark");
        $(".user_class").addClass("text-dark");
    });
    
    $(".statistics").click(function(){
        $(".users_container").css("display","none");
        $(".dashboard_container").css("display","none");
        $(".statistics_container").css("display","flex");
        $(".dashboard_class").removeClass("text-dark");
        $(".users_class").removeClass("text-dark");
        $(".statistics_class").addClass("text-dark");
    });
});