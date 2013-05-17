<?php
/**
 * User: jiangshuguang
 */
include_once str_replace("\\","/",dirname(__FILE__))."/../env.php";
include_once BASE_SRC."model/ReportSimpleModel.class.php";
include_once BASE_SRC."util/File.class.php";


class Report{
    public static function doCreate(){
        $reportInfo = array();
        global $smarty;
        if(isset($_POST["project"])){
            $reportInfo["project"] = preg_replace("/\s/","",$_POST["project"]);
        }

        if(isset($_POST["version"])){
            $reportInfo["version"] = preg_replace("/\s/","",$_POST["version"]);
        }

//        if(isset($_POST["start_time"])){
//            $start_time = $_POST["start_time"];
//            $reportInfo["start_time"] = date('Y-m-d H:i:s',strtotime($start_time));
//        }
//
//        if(isset($_POST["end_time"])){
//            $end_time = $_POST["end_time"];
//            $reportInfo["end_time"] = date('Y-m-d H:i:s',strtotime($end_time));
//        }

        if(isset($_POST["is_auto_test"])){
            if($_POST["is_auto_test"] == "on"){
                $reportInfo["isAutoTest"] = true;
                $reportInfo["autoCov"] = $_POST["autoCov"];
                $reportInfo["autoContent"] = explode("\r\n",$_POST["autoContent"]);
                $reportInfo["autoResult"] = explode("\r\n",$_POST["autoResult"]);
            }else{
                $reportInfo["isAutoTest"] = false;
            }
        }else{
            $reportInfo["isAutoTest"] = false;
        }

        if(isset($_POST["is_manual_test"])){
            if($_POST["is_manual_test"] == "on"){
                $reportInfo["isManualTest"] = true;
                $reportInfo["manulResult"] =explode("\r\n",$_POST["manulResult"]);
                $reportInfo["manulContent"] =explode("\r\n",$_POST["manulContent"]);
            }else{
                $reportInfo["isManualTest"] = false;
            }
        }else{
            $reportInfo["isManualTest"] = false;
        }


//        if(isset($_POST["is_ut_case"])){
//            if($_POST["is_ut_case"] == "on"){
//                $reportInfo["isUtCase"] = true;
//                $reportInfo["utContent"] = $_POST["utContent"];
//                $reportInfo["utResult"] = explode("\r\n",$_POST["utResult"]);
//            }else{
//                $reportInfo["isUtCase"] = false;
//            }
//        }else{
//            $reportInfo["isUtCase"] = false;
//        }


        if(isset($_POST["is_bug_statistic"])){
            if($_POST["is_bug_statistic"] == "on"){
                $reportInfo["isBugStatistic"] = true;
                $reportInfo["bugStatisticContent"] = $_POST["bugStatisticContent"];
                $reportInfo["bugStatisticResult"] = explode("\r\n",$_POST["bugStatisticResult"]);
            }else{
                $reportInfo["isBugStatistic"] = false;
            }
        }else{
            $reportInfo["isBugStatistic"] = false;
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
        $describes = array();
        while(isset($_POST["fun".$index])){
            if(!empty($_POST["fun".$index])){
                $funs[] = $_POST["fun".$index];
                $describes[] = explode("\r\n",$_POST["describe".$index]);
            }
            $index++;
        }
        if(count($funs)>0){
            $reportInfo["funs"] = $funs;
        }else{
            $reportInfo["funs"] = false;
        }

        if(count($describes)>0){
            $reportInfo["describes"] = $describes;
        }else{
            $reportInfo["describes"] = false;
        }

//        $reportInfo = include BASE_SRC."control/data.php";
        $reportSimpleData = new ReportSimpleData($reportInfo);
        $module = $reportSimpleData->getResult();
//        header("Content-type: text/html; charset=utf-8");
//        var_dump($module);

        $smarty->assign("report_full_url","http://www.baidu.com");

//        $reportData = new ReportData($reportInfo["project"],$reportInfo["version"],$reportInfo);
//        $module = $reportData->getData();
//
        $report_simple_file = BASE_SRC."/../report_simple_result/".str_replace("-","_",$module["project"])."_".str_replace("-","_",$module["version"])."_report.html";
        $report_full_file = BASE_SRC."/../report_full_result/".str_replace("-","_",$module["project"])."_".str_replace("-","_",$module["version"])."_report.html";
        $report_full_url = BASE_URL."/report_full_result/".str_replace("-","_",$module["project"])."_".str_replace("-","_",$module["version"])."_report.html";

        /*
         * 简单版的report
         * */
        $smarty->assign("module", $module);
        $smarty->assign("report_full_url",$report_full_url);
        $report_content = $smarty->fetch("page/report_simple/simple.tpl");
        if(file_exists($report_simple_file)){
            unlink($report_simple_file);
        }
        file_put_contents($report_simple_file,$report_content);

        $module_full = $module;
        if(isset($module_full["autoTest"]["covs"])){
            $module_full["autoTest"]["covs"] = json_encode($module_full["autoTest"]["covs"]);
        }
        if(isset($module_full["autoTest"]["versions"])){
            $module_full["autoTest"]["versions"] = json_encode($module_full["autoTest"]["versions"]);
        }

        if(isset($module_full["bugStatistic"]["bugs"])){
            $module_full["bugStatistic"]["bugs"] = json_encode($module_full["bugStatistic"]["bugs"]);
        }
        if(isset($module_full["bugStatistic"]["versions"])){
            $module_full["bugStatistic"]["versions"] = json_encode($module_full["bugStatistic"]["versions"]);
        }
        $smarty->assign("module", $module_full);


        /*
         *  详细版本的report
         * */
        $smarty->assign("report_simple_file", $report_simple_file);
        $report_content = $smarty->fetch("page/report_simple/full.tpl");
        if(file_exists($report_full_file)){
            unlink($report_full_file);
        }
        file_put_contents($report_full_file,$report_content);

        /*
         * 预览结果
         * */
        $smarty->display("page/report_simple/index.tpl");
    }
}

Report::doCreate();