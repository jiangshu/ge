$(function(){

   $(":checkbox").click(function(){
       if($(this).attr("checked")){
           $(this).next().slideDown();
       }else{
           $(this).next().slideUp(600);
       }
   });

    $("textarea").one("focus",function(){
          $(this).html("");
          $(this).css("color","#000");
    });

    $(".plus").on("click",function(){
         var html = ''+
             '<div style="display: none;margin-bottom:5px;">'+
                 '<input type="text"  class="fun_index" placeholder="升级的功能描述" style="width:60%;margin-right:5px"/>'+
                 '<input type="text"  class="key_index" placeholder="功能描述关键字" style="width:30%;margin-right:5px"/>'+
                 '<div class="sub">-</div>'+
             '</div>';

        $(this).before(html).prev().show(600);
        $.each($(".fun_index"),function(key,val){
            $(val).attr("name","fun"+key);
        });

        $.each($(".key_index"),function(key,val){
            $(val).attr("name","key"+key);
        });
        sub();
    });

    var sub = function(){
        $(".sub").on("click",function(){
            $(this).parent().remove();
            $.each($(".fun_index"),function(key,val){
                $(val).attr("name","fun"+key);
            });

            $.each($(".key_index"),function(key,val){
                $(val).attr("name","key"+key);
            });
        })
    };
    sub();


    var start_datepicker = new magic.setup.datePicker('start_time', {
        'format': 'yyyy/MM/dd',
        'popupOptions': {
            offsetY: 1
        },
        'calendarOptions': {
            'weekStart': 'sun',
            'initDate': new Date()
//            'highlightDates': [new Date('2012/05/06'), new Date('2010/09/12'), {start: new Date('2012/05/15'), end: new Date('2012/06/05')}, new Date('2012/06/30')],
//            'disabledDates': [{end: new Date('2012/05/05')}, new Date('2012/06/25')]
        }
    });

    var end_datepicker = new magic.setup.datePicker('end_time', {
        'format': 'yyyy/MM/dd',
        'popupOptions': {
            offsetY: 1
        },
        'calendarOptions': {
            'weekStart': 'sun',
            'initDate': new Date()
//            'highlightDates': [new Date('2012/05/06'), new Date('2010/09/12'), {start: new Date('2012/05/15'), end: new Date('2012/06/05')}, new Date('2012/06/30')],
//            'disabledDates': [{end: new Date('2012/05/05')}, new Date('2012/06/25')]
        }
    });

    $(".report_create #submit").click(function(){
         if($(".report_create #version").attr("value") == ""){
            Ge.tip($(".report_create #version"),"版本号不能为空");
             $(".report_create #version").one("mousemove",function(){
                 $("#tip").remove();
             });
        }else if($(".report_create #start_time").attr("value")== ""){
             Ge.tip($(".report_create #start_time"),"起始时间不能为空");
             $(".report_create #start_time").one("mousemove",function(){
                 $("#tip").remove();
             });
         }else if($(".report_create #end_time").attr("value") == ""){
             Ge.tip($(".report_create #end_time"),"结束时间不能为空");
             $(".report_create #end_time").one("mousemove",function(){
                 $("#tip").remove();
             });
         }else{
             /*
              *判断起止时间是否合法
              * */
            return true;
        }
        return false;
    });
});