<?php
/**
 * User: jiangshuguang
 */
include_once str_replace("\\","/",dirname(__FILE__))."/../conf/config.php";
include_once str_replace("\\","/",dirname(__FILE__))."/../smarty/config.php";
include_once BASE_SRC."/util/phantom/Phantom.class.php";
$action = $_GET["action"];
$project = $_GET["project"];
$version = $_GET["version"];

if($action == "createPicture"){
    include_once BASE_SRC."/util/phantom/Phantom.class.php";
    $url = BASE_URL."/control/ReportToPictureController.php?info=$project**$version"; //不知道phantom为什么不能带两个参数，所以转化成一个参数
    $saveFile = BASE_SRC."tmp/".str_replace("-","_",$project)."_report.jpg";

    if(file_exists($saveFile)){
        unlink($saveFile);
    }

    Phamtom::createPicture($url,$saveFile);
    echo "ok";

}else if($action == "mail_picture"){

}
