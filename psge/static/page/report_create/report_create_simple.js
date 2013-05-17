$(function(){
   var html = '' +
       '<tr style="display: none">' +
       '<td>' +
            '功能点：<input type="text" class="fun_index"  style="width:510px;margin-bottom: 5px"/>' +
            ' 详细描述： <textarea rows="4" class="describe1_index"   cols="70"></textarea>' +
       '</td>' +
       '<td>' +
            '<div class="sub">-</div>' +
       '</td>' +
       '</tr>' +
       '';

    $(".plus").on("click",function(){
         $(html).insertBefore($(this).parent().parent()).show(1500);

        $.each($(".fun_index"),function(key,val){
            $(val).attr("name","fun"+key);
        });

        $.each($(".describe1_index"),function(key,val){
            $(val).attr("name","describe"+key);
        });

        $(".sub").on("click",function(){
            $(this).parent().parent().remove();
            $.each($(".fun_index"),function(key,val){
                $(val).attr("name","fun"+key);
            });

            $.each($(".describe1_index"),function(key,val){
                $(val).attr("name","describe"+key);
            });
        });
    });
});