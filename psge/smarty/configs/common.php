<?php
require_once "smarty.config.php";


//自定义一个函数
//调用方法：<{test1 times="4" size="5" con="Hello,Liuyibao!" color="red"}>
class report{
    function test1($args){
        $str="";
        for($i=0;$i<$args['times'];$i++){
            $str.="<p style='font-size:{$args['size']}em;color:{$args['color']}'>{$args['con']}</p>";
        }
        return $str;
    }


//自定义一个块方式函数
//调用方法<{test1}><{/test1}>
    function test2($args,$con){
        $str="";
        for($i=0;$i<$args['times'];$i++){
            $str.="<p style='font-size:{$args['size']}em;color:{$args['color']}'>{$con}</p>";
        }
        return $str;
    }


//定义一个计算方法
    function jisuan($args){
        switch($args['operate']){
            case "+" :$res=$args['num1']-$args['num2'];break;
            case "-" :$res=$args['num1']-$args['$num2'];break;
            case "*" :$res=$args['num1']*$args['$num2'];break;
            case "/" :$res=$args['num1']/$args['$num2'];break;
        }
        return $res;
    }

    public static function test3(){
        echo "report.test3";
    }
}



//注册一下
$smarty->registerClass("report","report");

?>