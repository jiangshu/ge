<?php
include_once str_replace("\\","/",dirname(__FILE__))."/../smarty/config.php";
if(isset($_GET["filename"])){

    $filename=$_GET["filename"];//获取参数
    header('Content-type: image/jpeg');
    header("Content-Disposition: attachment; filename='$filename'");
//注意：header函数前确保没有任何输出

    exit;//结束程序
}


