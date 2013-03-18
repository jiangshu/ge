(function(){

    function tip(root,text){
        var top = $(root).offset().top,
            left = $(root).offset().left,
            height = $(root).height();
        text = text || "*此项不能为空";
        if($("#tip").length==0){
            var html = ''+
                '<div id="tip">'+
                '<div class="triangle"></div>'+
                '<div class="tip_content">'+
                text+
                '</div>'+
                '</div>';

            $(html).appendTo("body");
        }
        $("#tip").css({"top":top+height-15,"left":left+20}).show(1000);
    }

    function MouseMoveEven(root){
        $(root).one("mousemove",function(){
            if($("#tip").length>0){
                $("#tip").hide(500);
            }
        });
    }

    $(function(){
        $(".project_add .submit").click(function(){
            if($(".project_add #project_name").attr("value") == ""){

                MouseMoveEven($(".project_add #project_name"));
                tip($(".project_add #project_name"));

            }else if($(".project_add #version").attr("value") == ""){

                MouseMoveEven($(".project_add #version"));
                tip($(".project_add #version"));

            }else if($(".project_add #info").attr("value") == ""){

                MouseMoveEven($(".project_add #info"));
                tip($(".project_add #info"));

            }else if($(".project_add #space").attr("value") == ""){

                MouseMoveEven($(".project_add #space"));
                tip($(".project_add #space"));

            }else if($(".project_add #module").attr("value") == ""){

                MouseMoveEven($(".project_add #module"));
                tip($(".project_add #module"));

            }else{
                return true;
            }
            return false;
        });

        $("form :input").one("focus",function(){
            this.value = "";
            $(this).css("color","#fff");
        });
    });
})();