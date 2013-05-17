<?php
function createDiffDate($diffdatas){
    $saveFile = dirname(__FILE__)."/result/diffDate.php";
    $fileData = array();
    if(file_exists($saveFile)){
        $fileData = include $saveFile;
    }


    $res = array_diff_key($fileData,$diffdatas);
    $fileData = $res;
    $fileData = array_merge($fileData,$diffdatas);
    $str_content = "<?php return ".var_export($fileData,TRUE).";";
    file_put_contents($saveFile,$str_content);
}


$diffdatas = array(
    "aa" =>array(
        "aaaaaaaaaa",
        "bbbbbbbbbb",
    ),
);

createDiffDate($diffdatas);