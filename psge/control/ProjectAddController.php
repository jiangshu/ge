<?php
include_once str_replace("\\","/",dirname(__FILE__))."/../env.php";
include_once BASE_SRC."model/ProjectListModel.class.php";

$project_name = $_POST["project_name"];
$version = $_POST["version"];
$info = $_POST["info"];
$space = $_POST["space"];
$module = $_POST["module"];
$ip_port = $_POST["CiIp"];
$mailto = $_POST["mailto"];
$mailgroup = $_POST["mailgroup"];

$merge_data = array(
    $project_name => array(
        "new_version"=> $version,
        "info" => $info,
        "trace" => $space,
        "ip_port" =>$ip_port,
        "module" => $module,
        "mailto" => $mailto,
        "mailgroup" => $mailgroup,
    )
);
$projectList = new ProjectListM();
$projectList ->mergeData($merge_data,$project_name);

header("location:../page/project_list.php");