$(function(){
    $(".mail").on("focus",function(){
        Ge.tip($(this),"多个mail以分号分隔");
    }).on("input",function(){
       $("#tip").remove();
    }).on("blur",function(){
        $("#tip").remove();
    });

//    $(".project_add .submit").click(function(){
//        if($(".project_add #project_name").attr("value") == ""){
//
//            MouseMoveEven($(".project_add #project_name"));
//            tip($(".project_add #project_name"));
//
//        }else if($(".project_add #version").attr("value") == ""){
//
//            MouseMoveEven($(".project_add #version"));
//            tip($(".project_add #version"));
//
//        }else if($(".project_add #info").attr("value") == ""){
//
//            MouseMoveEven($(".project_add #info"));
//            tip($(".project_add #info"));
//
//        }else if($(".project_add #space").attr("value") == ""){
//
//            MouseMoveEven($(".project_add #space"));
//            tip($(".project_add #space"));
//
//        }else if($(".project_add #module").attr("value") == ""){
//
//            MouseMoveEven($(".project_add #module"));
//            tip($(".project_add #module"));
//
//        }else{
//            return true;
//        }
//        return false;
//    });
});