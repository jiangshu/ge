<?php
/**
 * User: jiangshuguang
 * Date: 13-2-18
 * Time: 下午2:09
 */
include_once str_replace("\\","/",dirname(__FILE__))."/../env.php";
include_once BASE_SRC."model/DataBase.php";
include_once BASE_SRC."model/parse/ParseCov.php";
include_once BASE_SRC."model/parse/ParseDiff.php";
include_once BASE_SRC."model/TraceModel.class.php";
include_once BASE_SRC."util/File.class.php";
include_once BASE_SRC."model/ProjectListModel.class.php";

class ReportData{
    private $reportInfo;
    private $project;
    private $version;
    private $result; //从数据库中查询本次版本的信息

    public function __construct($project,$version,$reportInfo=array()){
        $this->project = $project;
        $this->version = $version;
        $this->result = $reportInfo;
        $projectList = new ProjectListM();
        $this->projectInfo = $projectList->getProject($project);
    }

    /*
     * 获取覆盖率信息
     * */
    public function getData(){
        $result = $this->result;
        return
        array(
            "project"=>str_replace("-","_",$this->project),
            "version" => $this->version,
            "name"=>$this->project."-".$this->version,
            "data"=>array(
                "content"=>array(
                    "funs"=>$this->getFunData(),
                    "result"=>$this->getResultData(),
                    "effi"=>$this->getEffiData(),
                    "exp"=>$this->getExpData(),
                ),
                "testdata"=>array(
                    "bugs"=>$this->getBugs(),
                    "diffs"=>$this->getDiffData(),
                    "cov"=>$this->getCovData(),
                    "else"=>$this->getElseData()
                ),
            )
        );
    }

    public function getFunData(){
        if($this->result["funs"]){
            return array(
                "title"=>"升级的功能点",
                "data"=>$this->result["funs"],
            );
        }else{
            return false;
        }
    }

    public function getEffiData(){
        if($this->result["effi"]){
            return array(
                "title"=>"效率数据",
                "data"=>$this->result["effi"],
            );
        }else{
            return false;
        }
    }


    public function getExpData(){
        if($this->result["declaration"]){
            return array(
                "title"=>"说明",
                "data"=>$this->result["declaration"],
            );
        }else{
            return false;
        }
    }


    public function getResultData(){
        if($this->result["result"]){
            return array(
                "title"=>"测试结论",
                "data"=>$this->result["result"],
            );
        }else{
            return false;
        }
    }


    /*
     * 测试数据的其它数据
     * 1.本版本自动化case添加个数
     * 2.Start.sh脚本
     * 3.CI、sample自动化是否全部通过
     * 4.是否在编译机上运行（用于保证产品线使用编辑机环境正常）
     * */
    public function getElseData(){
        $result = $this->result;
        $elseData = array();

        if($result["isdiff"]){
            $elseData["isdiff"] = "1";
            $elseData["diffResult"] = $result["diffResult"];
        }else{
            $elseData["isdiff"] = "0";
        }

        if($result["iscov"]){
            $elseData["iscov"] = "1";
            $elseData["covResult"] = $result["diffResult"];
        }else{
            $elseData["iscov"] = "0";
        }

        if($result["is_CI_Sample"]){
            $elseData["is_CI_Sample"] = "1";
            $elseData["CI_Sample"] = $result["CI_Sample"];
        }else{
            $elseData["is_CI_Sample"] = "0";
        }

        if($result["isCompile"]){
            $elseData["isCompile"] = "1";
            $elseData["compile"] = $result["compile"];
        }else{
            $elseData["isCompile"] = "0";
        }

        if($result["isCaseStatistic"]){
            $elseData["isCaseStatistic"] = "1";
            $elseData["caseStatistic"] = $result["caseStatistic"];
        }else{
            $elseData["isCaseStatistic"] = "0";
        }

        if($result["isStartScript"]){
            $elseData["isStartScript"] = "1";
            $elseData["startScript"] = $result["startScript"];
        }else{
            $elseData["isStartScript"] = "0";
        }
        return $elseData;
    }
    /*
     * 获取bug 信息
     * */
    public function getCovData(){
         if($this->result["iscov"]){
             $cov_url = Config::fis_url."cov.php?project=".$this->project; //CI机器获取coverage数据的url
              $covDatas = include COV_FILE;
              if(array_key_exists($this->project,$covDatas)){
                  if(array_key_exists($this->version,$covDatas[$this->project])){
                      $covDatas[$this->project][$this->version] = ParseCov::getCov($cov_url);
                  }else{
                      $covDatas[$this->project] = array_merge($covDatas[$this->project],array(
                          $this->version =>ParseCov::getCov($cov_url)
                      ));
                  }
              }else{
                  $covDatas = array_merge($covDatas,array(
                      $this->project =>array(
                          $this->version => ParseCov::getCov($cov_url)
                      )
                  ));
              }

              GEFile::saveFile($covDatas,BASE_SRC."/model/data/cov.php");

             $versions = array();
             $covs = array();
              foreach($covDatas[$this->project] as $version=>$cov){
                  array_push($versions,$version);
                  array_push($covs,$cov);
              }

              return  array(
                  "versions" => json_encode($versions),
                  "covs" => json_encode($covs),
              );

         }else{
            return 0;
        }
    }


   /*
    * 获取diff信息
    * */
    public function getDiffData(){
        if($this->result["isdiff"]){
            $diffDatas = include DIFF_FILE;
            $diff_url = Config::fis_url."/diff.php?project=".$this->project;
            $curDiffData = ParseDiff::getDiff($diff_url);
            if(array_key_exists($this->project,$diffDatas)){
                  $diffDatas[$this->project] = $curDiffData;
            }else{

                $diffDatas = array_merge($diffDatas,array(
                    $this->project =>$curDiffData
                ));
            }
            GEFile::saveFile($diffDatas,BASE_SRC."/model/data/diff.php");
            return $curDiffData;
        }else{
            return 0;
        }
    }


   /*获取bug列表
    * 1.升级的功能点
    * 2.此功能点的bug数
    * 3.负责人 开发人员&QA
    * 4.未关闭的bug数
    */
    public function getBugs(){
        //升级的功能点
        if($this->result["funs"]){
            $funs = $this->result["funs"];
            $keys = $this->result["keys"];
            $len = count($funs);
            $project_list = include PROJECT_LIST_FILE;
            $traceSpace = $project_list[$this->project]["trace"];
            $traceModules = $project_list[$this->project]["module"];

            //查询某时间段的bug
            $start_time = strtotime($this->result["start_time"]);
            $end_time = strtotime($this->result["end_time"]);
            $TraceDatas = Trace::get(1000,$traceSpace,$traceModules);
            $bugs = array();
            foreach($funs as $fun){
                array_push($bugs,array(
                    "fun"=>$fun,
                    "count"=>0,
                    "qa"=>array(),
                    "rd"=>array(),
                    "active" =>0,
                ));
            }

            foreach($TraceDatas as $bugItem){
                $latesthistorytimestamp = $bugItem["latesthistorytimestamp"];
                $latesthistorytimestamp = strtotime($latesthistorytimestamp);
                if($start_time<=$latesthistorytimestamp && $end_time>=$latesthistorytimestamp){
                    $key = array();
                    preg_match("/【.*】/",$bugItem["summary"],$key);
                    if(count($key)>0){
                        $key = str_replace("】","",str_replace("【","",$key[0]));
                        for($i=0;$i<$len;$i++){
                            if(preg_match("/$key/",$keys[$i])){
                                break;
                            }
                        }

                        if($i!=$len){
                            $assignedto = $bugItem["assignedto"];
                            $loggedby = $bugItem["loggedby"];
                            $resolveBy = $bugItem["resolveBy"];
                            if(!preg_match("/$loggedby/",implode(" /  ",$bugs[$i]["qa"])) && $loggedby!="none"){
                                $bugs[$i]["qa"][]=$loggedby;
                            }
                            if(!preg_match("/$assignedto/",implode(" /  ",$bugs[$i]["rd"])) && $assignedto!="none" ){
                                $bugs[$i]["rd"][] = $assignedto;
                            }else if(!preg_match("/$resolveBy/",implode(" /  ",$bugs[$i]["rd"])) && $resolveBy!="none" ){
                                $bugs[$i]["rd"][] = $resolveBy;
                            }

                            $bugs[$i]["count"]++;
                            if($bugItem["status"] == "Active"){
                                $bugs[$i]["active"]++;
                            }
                        }
                    }
                }
            }
            for($i=0;$i<$len;$i++){
                $bugs[$i]["qa"] = "QA:".implode(" / ",$bugs[$i]["qa"]);
                $bugs[$i]["rd"] = "RD:".implode(" / ",$bugs[$i]["rd"]);
            }
            return $bugs;
        }else{
            return false;
        }
    }
}

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
////
//$reportData = new ReportData($reportInfo["project"],$reportInfo["version"],$reportInfo);
//var_dump($reportData->getData());
//var_dump($reportData->getBugs());
//var_dump($reportData->getDiffData());

