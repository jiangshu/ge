(function(){
    var Ge;
    'Ge' in window ? Ge = window.Ge:Ge={};

    Ge.tip = function(root,text){
        var top = $(root).offset().top,
            left = $(root).offset().left,
            height = $(root).height();
        text = text || "*此项不能为空";
        if($("#tip").length==0){
            var html = ''+
                '<div id="tip" style="position:absolute;">'+
                '<div class="triangle"></div>'+
                '<div class="tip_content">'+
                text+
                '</div>'+
                '</div>';

            $(html).appendTo("body");
        }
        $("#tip").css({"top":top+height-15,"left":left+10}).show(1000);
    };
    window.Ge = Ge;

})();