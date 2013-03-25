<?php
include_once str_replace("\\","/",dirname(__FILE__))."/../env.php";
include_once BASE_SRC."util/mail/Mail.class.php";
include_once BASE_SRC."model/ProjectListModel.class.php";

//$_GET["file"]  = "aaa";
//$_GET["project"] = "fis-pc";
//$_GET["version"] = "1.3.9";

$file = $_GET["file"];
$project = $_GET["project"];
$version = $_GET["version"];

$projectList  = new ProjectListM();
$projectInfo = $projectList->getProject($project);
$mailTo = array();
$mailCC = array();

if(isset($projectInfo["mailto"]) && $projectInfo["mailto"]!=""){
    $mailTo = explode(";",$projectInfo["mailto"]);
}
if(isset($projectInfo["mailgroup"]) && $projectInfo["mailgroup"]!=""){
    $mailCC = explode(";",$projectInfo["mailgroup"]);
}

$title = $project."-".$version."测试报告";
$result = Mail::doSend($mailTo,$mailCC,$file,$title);;
echo $result;