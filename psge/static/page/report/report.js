(function(){
    window.Ge =  {};
    Ge.CreateChart = function (covdata,labels) {
//        var covdata = ["45","45","45","45"];
//        var resolved = ["6","12","18","24"];
//        var closed = ["7","17","21","28"];
//        var labels =  ["1.3.8","1.3.9","1.4.0","1.4.1"];
//        var labelsE =  ["1.3.8","1.3.9","1.4.0","1.4.1"];

        var max = "",
            min = "",
            length = 0,
            rage;

        $.each(covdata,function(key,val){
            val = parseFloat(val);

            if(max == ""){
                max = val;
            }else if(max<val){
                max = val;
            }
            if(min == ""){
                min = val;
            }else if(min>val){
                min = val;
            }
            length++;
        });

        if(max == min){
            rage = 1;
            var temp = max;
            temp = temp.toString().split(".")[0];
            temp = parseFloat(temp);
            max = temp + 5;
            min = temp - 5;
            if(max>100){
                max = 100;
                min = 90;
            }else if(min<0){
                min = 0;
                max = 10;
            }

        }else if(max-min<1){
            min = (max+min)/2 - 0.5;
            if(min<0){
                min = 0;
            }else{
                min = (min*10).toString().split(".")[0]/10;
            }
            rage = 0.1;
        }else if(max-min<10){
            min = (max+min)/2 - 5;
            if(min<0){
                min=0;
            }else{
                min = min.toString().split(".")[0];
                min = parseFloat(min);
            }
            rage=1;
        }else{
            if(max<10){
                max = 10;
            }else{
                max = max.toString()[0]*10+10;
            }
            if(min<10){
                min = 0;
            }else{
                min = min.toString()[0]*10;
            }
            rage = (max-min)/10;
        }
        var labelsE =  labels;
        var data = [
            {
                name:'coverage %',
                value:covdata,
                color:'#FF6699',
                line_width:2
            }
        ];

        var chart = new iChart.LineBasic2D({
            render:'case_coverage',
            data:data,
            align:'center',
            title:'单测覆盖率变化趋势',
            subtitle:'',
            footnote:'',
            width:600,
            height:400,
            background_color:'#333333',
            tip:{
                enable:true,
                shadow:true,
                move_duration:400,
                border:{
                    enable:true,
                    radius:5,
                    width:2,
                    color:'#ffffff'
                },
                listeners:{
                    //tip:提示框对象、name:数据名称、value:数据值、text:当前文本、i:数据点的索引
                    parseText:function (tip, name, value, text, i) {
                        return name + ":" + value + "个";
                    }
                }
            },
            tipMocker:function (tips, i) {
                return "<div style='font-weight:600'>" +
                    labelsE[i] + "</div>" + tips.join("<br/>");
            },
            legend:{
                enable:true,
                row:1, //设置在一行上显示，与column配合使用
                column:'max',
                valign:'top',
                sign:'bar',
                background_color:null, //设置透明背景
                offsetx:-80, //设置x轴偏移，满足位置需要
                border:true
            },
            crosshair:{
                enable:true,
                line_color:'#fff'//十字线的颜色
            },
            sub_option:{
                label:false,
                point_size:10
            },
            coordinate:{
                width:640,
                height:240,
                axis:{
                    color:'#dcdcdc',
                    width:1
                },
                scale:[
                    {
                        position:'left',
                        start_scale:min,
                        end_scale:max,
                        scale_space:rage,
                        scale_size:2,
                        scale_color:'#9f9f9f'
                    },
                    {
                        position:'bottom',
                        labels:labels
                    }
                ]
            }
        });
        //开始画图
        chart.draw();
    };



    /*
     *  这部分的代码还有待完善
     * */
    Ge.covGra = function(el,data){

        data =data.replace(/'/g,"\"");
        data = JSON.parse(data);
        var max = "",
            min = "",
            length = 0;

        $.each(data,function(key,val){
            val = parseFloat(val);
            if(max == ""){
                max = val;
            }else if(max<val){
                max = val;
            }
            if(min == ""){
                min = val;
            }else if(min>val){
                min = val;
            }
            length++;
        });

        var dis_h,val_v,rage;
        dis_h = 400/(length-1);

        if(max-min<1){
            min = (max+min)/2 - 0.5;
            if(min<0){
                min = 0;
            }else{
                min = (min*10).toString().split(".")[0]/10;
            }
            rage = 0.1;
        }else if(max-min<10){
            min = (max+min)/2 - 5;
            if(min<0){
                min=0;
            }else{
                min = min.toString().split(".")[0];
                min = parseFloat(min);
            }
            rage=1;
        }else{
            if(max<10){
                max = 10;
            }else{
                max = max.toString()[0]*10+10;
            }
            if(min<10){
                min = 0;
            }else{
                min = min.toString()[0]*10;
            }
            rage = (max-min)/10;
        }
        var height = rage*10;
        var html = '<div class="graphic">'+
            '<canvas  class="canvas" width="400" height="270"> </canvas>'  +
            '</div>' ;
        $(el).append(html);
        var ctx = $(el).find(".canvas").get(0).getContext("2d");
        ctx.strokeStyle = "d0d0d0";
        ctx.lineWidth = 2;

        //横向网格
        for(var i=1; i<10;i++){
            ctx.beginPath();
            ctx.moveTo(0,i*27);
            ctx.lineTo(400,i*27);
            ctx.stroke();
            ctx.closePath();
        }

        //纵向网格
        for(var i=1;i<length-1;i++){
            ctx.beginPath();
            ctx.moveTo(i*dis_h,0);
            ctx.lineTo(i*dis_h,270);
            ctx.stroke();
            ctx.closePath();
        }

        for(var i=0;i<=10;i++){
            $(el).find(".graphic").append("<span class='Yaxis' style='top:"+(i*27+20)+"px;'>"+((10-i)*rage+min)+"%</span>");
        }

        ctx.strokeStyle = "FF0000";
        ctx.lineWidth = 2;
        ctx.beginPath();
        var i = 0, old_val;
        $.each(data,function(key,val){
            val = parseFloat(val);
            if(i!=0){
                ctx.moveTo((i-1)*dis_h,270-(old_val-min)*270/height);
                ctx.lineTo(i*dis_h,270-(val-min)*270/height);
            }
            $(el).find(".graphic").append("<span class='Xaxis' style='left:"+(50+i*dis_h)+"px;'>"+key+"</span>");
            old_val = val;
            i++;
        });
        ctx.stroke();
        ctx.closePath();

        ctx.strokeStyle = "FF0000";
        ctx.lineWidth = 2;
        ctx.beginPath();

        ctx.moveTo(0,220);
        ctx.lineTo(80,180);

        ctx.moveTo(80,180);
        ctx.lineTo(160,60);

        ctx.moveTo(160,60);
        ctx.lineTo(240,120);

        ctx.moveTo(240,120);
        ctx.lineTo(320,60);

        ctx.moveTo(320,60);
        ctx.lineTo(400,120);

        ctx.stroke();
        ctx.closePath();
    };
})();
