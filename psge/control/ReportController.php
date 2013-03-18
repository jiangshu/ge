<?php
/**
 * User: jiangshuguang
 */
include_once str_replace("\\","/",dirname(__FILE__))."/../smarty/config.php";
include_once str_replace("\\","/",dirname(__FILE__))."/"."../model/ReportModel.class.php";
include_once str_replace("\\","/",dirname(__FILE__))."/../util/File.class.php";
include_once BASE_SRC."/util/phantom/Phantom.class.php";
//header("Content-type: text/html; charset=utf-8");

$reportInfo = array();
$reportData = array();

if(isset($_GET["browser"])){  //***  浏览模式

    if(isset($_GET["project"])){
         $reportInfo["project"] = preg_replace("/\s/","",$_GET["project"]);
    }

    if(isset($_GET["version"])){
          $reportInfo["version"] = preg_replace("/\s/","",$_GET["version"]);
    }
    $reportData = new ReportData($reportInfo["project"],$reportInfo["version"]);

}else{                        //***  生成模式

    if(isset($_POST["project"])){
        $reportInfo["project"] = preg_replace("/\s/","",$_POST["project"]);
    }

    if(isset($_POST["version"])){
        $reportInfo["version"] = preg_replace("/\s/","",$_POST["version"]);
    }

    if(isset($_POST["start_time"])){
        $start_time = $_POST["start_time"];
        $reportInfo["start_time"] = date('Y-m-d H:i:s',strtotime($start_time));
    }

    if(isset($_POST["end_time"])){
        $end_time = $_POST["end_time"];
        $reportInfo["end_time"] = date('Y-m-d H:i:s',strtotime($end_time));
    }

    if(isset($_POST["isdiff"])){
        if($_POST["isdiff"] == "on"){
            $reportInfo["isdiff"] = 1;
            $reportInfo["diffResult"] =explode("\r\n",$_POST["diffResult"]);
        }else{
            $reportInfo["isdiff"] = 0;
        }
    }else{
        $reportInfo["isdiff"] = 0;
    }

    if(isset($_POST["iscov"])){
        if($_POST["iscov"] == "on"){
            $reportInfo["iscov"] = 1;
            $reportInfo["covResult"] =explode("\r\n",$_POST["covResult"]);
        }else{
            $reportInfo["iscov"] = 0;
        }
    }else{
        $reportInfo["iscov"] = 0;
    }


    if(isset($_POST["is_CI_Sample"])){
        if($_POST["is_CI_Sample"] == "on"){
            $reportInfo["is_CI_Sample"] = 1;
            $reportInfo["CI_Sample"] = explode("\r\n",$_POST["CI_Sample"]);
        }else{
            $reportInfo["is_CI_Sample"] = 0;
        }
    }else{
        $reportInfo["is_CI_Sample"] = 0;
    }


    if(isset($_POST["isCompile"])){
        if($_POST["isCompile"] == "on"){
            $reportInfo["isCompile"] = 1;
            $reportInfo["compile"] = explode("\r\n",$_POST["compile"]);
        }else{
            $reportInfo["isCompile"] = 0;
        }
    }else{
        $reportInfo["isCompile"] = 0;
    }

    if(isset($_POST["isCaseStatistic"])){
        if($_POST["isCaseStatistic"] == "on"){
            $reportInfo["isCaseStatistic"] = 1;
            $reportInfo["caseStatistic"] = explode("\r\n",$_POST["caseStatistic"]);
        }else{
            $reportInfo["isCaseStatistic"] = 0;
        }
    }else{
        $reportInfo["isCaseStatistic"] = 0;
    }


    if(isset($_POST["isStartScript"])){
        if($_POST["isStartScript"] == "on"){
            $reportInfo["isStartScript"] = 1;
            $reportInfo["startScript"] = explode("\r\n",$_POST["startScript"]);
        }else{
            $reportInfo["isStartScript"] = 0;
        }
    }else{
        $reportInfo["isStartScript"] = 0;
    }


    if(isset($_POST["result"]) && !empty($_POST["result"])){
        $str = $_POST["result"];
        $reportInfo["result"] = explode("\r\n",$str);
    }else{
        $reportInfo["result"] = false;
    }

    if(isset($_POST["effi"]) && !empty($_POST["effi"])){
        $str = $_POST["effi"];
        $reportInfo["effi"] = explode("\r\n",$str);
    }else{
        $reportInfo["effi"] = false;
    }

    if(isset($_POST["declaration"]) && !empty($_POST["declaration"])){
        $str = $_POST["declaration"];
        $reportInfo["declaration"] = explode("\r\n",$str);;
    }else{
        $reportInfo["declaration"] = false;
    }

    $index=0;
    $funs = array();
    $keys = array();
    while(isset($_POST["fun".$index])){
        if(!empty($_POST["fun".$index])){
             $funs[] = $_POST["fun".$index];
             $keys[] = $_POST["key".$index];
        }
        $index++;
    }
    if(count($funs)>0){
        $reportInfo["funs"] = $funs;
    }else{
        $reportInfo["funs"] = false;
    }

    if(count($keys)>0){
        $reportInfo["keys"] = $keys;
    }else{
        $reportInfo["keys"] = false;
    }

    $reportData = new ReportData($reportInfo["project"],$reportInfo["version"],$reportInfo);
}

$reportData = new ReportData($reportInfo["project"],$reportInfo["version"],$reportInfo);
$module = $reportData->getData();






///*
// * 显示结果
// * */

//$reportInfo = array(
//    "project" => "fis-pc",
//    "version" => "1.4.2",
//    "start_time" => "2012-12-20 00:00:00",
//    "end_time" => "2013-03-10 23:59:59",
//    "isdiff"=> 1,
//    "diffResult"=>array(
//        0=>"一切正常",
//    ),
//    "iscov"=> 1,
//    "covResult"=>array(
//        0=>"一切正常",
//    ),
//    "is_CI_Sample"=>"1",
//    "CI_Sample"=>array(
//        0=>"已经全部通过",
//    ),
//    "isCompile"=>"1",
//    "compile"=>array(
//        0=>"在编译机上运行通过",
//    ),
//    "isCaseStatistic"=>"1",
//    "caseStatistic"=>array(
//        0=>"新增系统case 10个，都已经通过",
//        1=>"新增单测 10个，都已经通过"
//    ),
//    "isStartScript"=>"1",
//    "startScript"=>array(
//        0=>"在windows和linux下运行正常",
//    ),
//    "result" =>array(
//        0=> "bug都已修复",
//    ),
//    "effi" =>array(
//        0=>"由于bug 修复，延期了一天发布",
//    ),
//    "declaration" =>array(
//        0=>"单侧覆盖率有所下降",
//    ),
//    "funs" => array(
//        0=>"1.在js中f.uri自己，编译时会死循环，导致cgi挂掉",
//        1=>"2.后台,编译时会死循环",
//    ),
//    "keys" =>array(
//        0=>"f.uri",
//        1=>"后台"
//    ),
//);
//
//$reportData = new ReportData($reportInfo["project"],$reportInfo["version"],$reportInfo);
//$module = $reportData->getData();
///*
// * 保存report的内容
// * */
//$report_data_save_file = BASE_SRC."/model/data/".str_replace("-","_",$reportInfo["project"])."_report_info.php";
//if(file_exists($report_data_save_file)){
//    $report_data_save_content = include  $report_data_save_file;
//    if(array_key_exists($reportInfo["version"],$report_data_save_content)){
//        $report_data_save_content[$reportInfo["version"]] = $module;
//    }else{
//        $report_data_save_content[] = array($reportInfo["version"] => $module);
//    }
//    GEFile::saveFile($report_data_save_content,$report_data_save_file);
//}else{
//    GEFile::saveFile(array($reportInfo["version"]=>$module),$report_data_save_file);
//}

//$module =  array (
//    'project' => 'fis_pc',
//    'version' => '1.4.2',
//    'name' => 'fis-pc-1.4.2',
//    'data' =>
//    array (
//        'content' =>
//        array (
//            'funs' =>
//            array (
//                'title' => '升级的功能点',
//                'data' =>
//                array (
//                    0 => '1.在js中f.uri自己，编译时会死循环，导致cgi挂掉',
//                    1 => '2.后台,编译时会死循环',
//                ),
//            ),
//            'result' =>
//            array (
//                'title' => '测试结论',
//                'data' =>
//                array (
//                    0 => 'bug都已修复',
//                ),
//            ),
//            'effi' =>
//            array (
//                'title' => '效率数据',
//                'data' =>
//                array (
//                    0 => '由于bug 修复，延期了一天发布',
//                ),
//            ),
//            'exp' =>
//            array (
//                'title' => '说明',
//                'data' =>
//                array (
//                    0 => '单侧覆盖率有所下降',
//                ),
//            ),
//        ),
//        'testdata' =>
//        array (
//            'bugs' =>
//            array (
//                0 =>
//                array (
//                    'fun' => '1.在js中f.uri自己，编译时会死循环，导致cgi挂掉',
//                    'count' => 1,
//                    'qa' => 'QA:shenlixia01',
//                    'rd' => 'RD:yuanfang',
//                    'active' => 0,
//                ),
//                1 =>
//                array (
//                    'fun' => '2.后台,编译时会死循环',
//                    'count' => 2,
//                    'qa' => 'QA:shenlixia01',
//                    'rd' => 'RD:lixiaopeng',
//                    'active' => 0,
//                ),
//            ),
//            'diffs' =>
//            array (
//                'pic' =>
//                array (
//                    0 =>
//                    array (
//                        'module' => 'common',
//                        'new' => 28510,
//                        'old' => 28145,
//                        'change' => 1.3,
//                    ),
//                    1 =>
//                    array (
//                        'module' => 'album',
//                        'new' => 11914,
//                        'old' => 11852,
//                        'change' => 0.52,
//                    ),
//                    2 =>
//                    array (
//                        'module' => 'favtoolbar',
//                        'new' => 11076,
//                        'old' => 11258,
//                        'change' => -1.62,
//                    ),
//                    3 =>
//                    array (
//                        'module' => 'home',
//                        'new' => 3176,
//                        'old' => 3247,
//                        'change' => -2.19,
//                    ),
//                    4 =>
//                    array (
//                        'module' => 'manage',
//                        'new' => 9669,
//                        'old' => 9583,
//                        'change' => 0.9,
//                    ),
//                    5 =>
//                    array (
//                        'module' => 'message',
//                        'new' => 12475,
//                        'old' => 12479,
//                        'change' => -0.03,
//                    ),
//                    6 =>
//                    array (
//                        'module' => 'picture',
//                        'new' => 27573,
//                        'old' => 28529,
//                        'change' => -3.35,
//                    ),
//                    7 =>
//                    array (
//                        'module' => 'tag',
//                        'new' => 5126,
//                        'old' => 5048,
//                        'change' => 1.55,
//                    ),
//                    8 =>
//                    array (
//                        'module' => 'thirduser',
//                        'new' => 11154,
//                        'old' => 11261,
//                        'change' => -0.95,
//                    ),
//                    9 =>
//                    array (
//                        'module' => 'timeline',
//                        'new' => 13210,
//                        'old' => 13312,
//                        'change' => -0.77,
//                    ),
//                    10 =>
//                    array (
//                        'module' => 'user',
//                        'new' => 12298,
//                        'old' => 12443,
//                        'change' => -1.17,
//                    ),
//                ),
//            ),
//            'cov' =>
//            array (
//                'versions' => '["1.3.1","1.3.2","1.3.3","1.4.2","1.3.8"]',
//                'covs' => '["67.3","65.2","68.3","57.3","57.3"]',
//            ),
//            'else' =>
//            array (
//                'isdiff' => '1',
//                'diffResult' =>
//                array (
//                    0 => '一切正常',
//                ),
//                'iscov' => '1',
//                'covResult' =>
//                array (
//                    0 => '一切正常',
//                ),
//                'is_CI_Sample' => '1',
//                'CI_Sample' =>
//                array (
//                    0 => '已经全部通过',
//                ),
//                'isCompile' => '1',
//                'compile' =>
//                array (
//                    0 => '在编译机上运行通过',
//                ),
//                'isCaseStatistic' => '1',
//                'caseStatistic' =>
//                array (
//                    0 => '新增系统case 10个，都已经通过',
//                    1 => '新增单测 10个，都已经通过',
//                ),
//                'isStartScript' => '1',
//                'startScript' =>
//                array (
//                    0 => '在windows和linux下运行正常',
//                ),
//            ),
//        ),
//    ),
//);


//
//$report_simple_file = BASE_SRC."report_simple_result/".str_replace("-","_",$module["project"])."_".str_replace("-","_",$module["version"])."_report.html";
//$report_full_file = BASE_SRC."report_full_result/".str_replace("-","_",$module["project"])."_".str_replace("-","_",$module["version"])."_report.html";
//$report_full_url = BASE_URL."/report_full_result/".str_replace("-","_",$module["project"])."_".str_replace("-","_",$module["version"])."_report.html";
///*
// * 简单版的report
// * */
//$module_simple = $module;
//$module_simple["data"]["testdata"]["cov"]["versions"] = json_decode($module_simple["data"]["testdata"]["cov"]["versions"]);
//$module_simple["data"]["testdata"]["cov"]["covs"] = json_decode($module_simple["data"]["testdata"]["cov"]["covs"]);
//$smarty->assign("module", $module_simple);
//$smarty->assign("report_full_url",$report_full_url);
//$report_content = $smarty->fetch("page/report/simple.tpl");
//if(file_exists($report_simple_file)){
//    unlink($report_simple_file);
//}
//file_put_contents($report_simple_file,$report_content);
//
//
///*
// *  详细版本的report
// * */
//$smarty->assign("module", $module);
//$smarty->assign("report_simple_file", $report_simple_file);
//$report_content = $smarty->fetch("page/report/full.tpl");
//if(file_exists($report_full_file)){
//  unlink($report_full_file);
//}
//file_put_contents($report_full_file,$report_content);
//
///*
// * 详细版本生成图片
// * */
//$saveFile = BASE_SRC."report_image/".str_replace("-","_",$module["project"])."_".str_replace("-","_",$module["version"])."_report.png";
//if(file_exists($saveFile)){
//    unlink($saveFile);
//}
//Phamtom::createPicture($report_full_url,$saveFile);
//
//
///*
// * 预览结果
// * */
//$smarty->display("page/report/index.tpl");

