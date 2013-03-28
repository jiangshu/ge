$(function(){
    $(".mail").on("focus",function(){
        Ge.tip($(this),"多个mail以分号分隔");
    }).on("input",function(){
       $("#tip").remove();
    }).on("blur",function(){
        $("#tip").remove();
    });

    $(".project_add #submit").click(function(){
        if($(".project_add #project_name").attr("value") == ""){

            Ge.tip($(".project_add #project_name"),"项目名称不能为空");
            $(".project_add #project_name").one("mousemove",function(){
                $("#tip").remove();
            });

        }else if($(".project_add #version").attr("value") == ""){

            Ge.tip($(".project_add #version"),"版本号不能为空");
            $(".project_add #version").one("mousemove",function(){
                $("#tip").remove();
            });

        }else if($(".project_add #space").attr("value") == ""){

            Ge.tip($(".project_add #space"),"TRACE空间不能为空");
            $(".project_add #space").one("mousemove",function(){
                $("#tip").remove();
            });

        }else if($(".project_add #module").attr("value") == ""){

            Ge.tip($(".project_add #module"),"模块路径不能为空");
            $(".project_add #module").one("mousemove",function(){
                $("#tip").remove();
            });

        }else if($(".project_add #CiIp").attr("value") == ""){

            Ge.tip($(".project_add #CiIp"),"IP及端口不能为空");
            $(".project_add #CiIp").one("mousemove",function(){
                $("#tip").remove();
            });

        }else{
            return true;
        }
        return false;
    });
});