<?php
include_once str_replace("\\","/",dirname(__FILE__))."/../env.php";
include_once BASE_SRC."util/File.class.php";

$project = $_POST["project_name"];
$version = $_POST["version"];
$info = $_POST["info"];
$space = $_POST["space"];
$module = $_POST["module"];
$mailto = $_POST["mailto"];
$mailgroup = $_POST["mailgroup"];

$project_add = array(
    $project => array(
        "trace" => $space,
        "module" => $module,
        "new_version"=> $version ,
        "mail" => $mailto
    )
);

$project_list_file = BASE_SRC."model/data/project_list.php";
$project_list = $project_add;
if(file_exists($project_list_file)){
    $project_list = include_once($project_list_file);
    if(array_key_exists($project,$project_list)){
        unset($project_list[$project]);
    }
    $project_list = array_merge($project_list,$project_add);
}

GEFile::saveFile($project_list,$project_list_file);
header("location:../page/project_list.php");