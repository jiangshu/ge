<?php
/**
 * User: jiangshuguang
 */
include_once str_replace("\\","/",dirname(__FILE__))."/../env.php";
include_once BASE_SRC."model/ReportModel.class.php";
include_once BASE_SRC."util/File.class.php";
include_once BASE_SRC."util/phantom/Phantom.class.php";

class Report{
    public static function doCreate(){
        $reportInfo = array();
        $reportData = array();
        global $smarty;
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

        $reportData = new ReportData($reportInfo["project"],$reportInfo["version"],$reportInfo);
        $module = $reportData->getData();


        $report_simple_file = BASE_SRC."report_simple_result/".str_replace("-","_",$module["project"])."_".str_replace("-","_",$module["version"])."_report.html";
        $report_full_file = BASE_SRC."report_full_result/".str_replace("-","_",$module["project"])."_".str_replace("-","_",$module["version"])."_report.html";
        $report_full_url = BASE_URL."/report_full_result/".str_replace("-","_",$module["project"])."_".str_replace("-","_",$module["version"])."_report.html";


        /*
         * 简单版的report
         * */
        $module_simple = $module;
        $module_simple["data"]["testdata"]["cov"]["versions"] = json_decode($module_simple["data"]["testdata"]["cov"]["versions"]);
        $module_simple["data"]["testdata"]["cov"]["covs"] = json_decode($module_simple["data"]["testdata"]["cov"]["covs"]);
        $smarty->assign("module", $module_simple);
        $smarty->assign("report_full_url",$report_full_url);
        $report_content = $smarty->fetch("page/report/simple.tpl");
        if(file_exists($report_simple_file)){
            unlink($report_simple_file);
        }
        file_put_contents($report_simple_file,$report_content);

        /*
         *  详细版本的report
         * */
        $smarty->assign("module", $module);
        $smarty->assign("report_simple_file", $report_simple_file);
        $report_content = $smarty->fetch("page/report/full.tpl");
        if(file_exists($report_full_file)){
            unlink($report_full_file);
        }
        file_put_contents($report_full_file,$report_content);

        /*
         * 预览结果
         * */
         $smarty->display("page/report/index.tpl");
    }
}

Report::doCreate();