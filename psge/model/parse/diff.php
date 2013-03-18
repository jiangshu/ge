<?php
$project = $_GET["project"];
$project = str_replace("-","_",$project);
$diffDateFile = "/home/work/repos/".$project."_dev_diff_slow/test/util/diff/result/diffDate.php";

if(file_exists($diffDateFile)){
    $diffDate = include $diffDateFile;
    echo json_encode($diffDate);
}else{
    echo "";
}
