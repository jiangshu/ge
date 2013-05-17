<?php
include_once str_replace("\\","/",dirname(__FILE__))."/../env.php";
include_once BASE_SRC."util/File.class.php";

class ReportSimpleData{
    private $project;
    private $version;
    private $result;
    private $reportInfo;
    private $testData;
    public function __construct($reportInfo = array()){
        $this->project = $reportInfo["project"];
        $this->version = $reportInfo["version"];
        $this->reportInfo = $reportInfo;
        $this->testData = false;
    }

    public function getResult(){
        return array(
            "name"=>$this->project."_".$this->version,
            "result"=>$this->getTotalResult(),
            "effi"=>$this->getEffi(),
            "declaration"=>$this->getDeclaration(),
            "project"=>$this->project,
            "version"=>$this->version,
            "autoTest"=>$this->getAutoTest(),
//            "utCase"=>$this->getUtCase(),
            "manualTest"=>$this->getManualTest(),
            "bugStatistic"=>$this->getBugStatistic(),
            "funs"=>$this->getFuns(),
            "isTestData"=>$this->isTestData(),
        );
    }

    private function isTestData(){
        if($this->reportInfo["isBugStatistic"] ||
            $this->reportInfo["isManualTest"] ||
            $this->reportInfo["isAutoTest"]){
            return true;
        }else{
            return false;
        }
    }

    private function getTotalResult(){
        return array(
            "title"=>"测试结论",
            "data"=>$this->reportInfo["result"]
        );
    }

    private function getEffi(){
        return array(
            "title"=>"效率数据",
            "data"=>$this->reportInfo["effi"]
        );
    }

    private function getDeclaration(){
        return array(
            "title"=>"补充说明",
            "data"=>$this->reportInfo["declaration"]
        );
    }

        /*
         *  bug数的读写
         * */
    public function getBugList(){
        $bugList = include BUG_FILE;
        if($this->reportInfo["isBugStatistic"]){
            if(isset($bugList[$this->project])){
                if(isset($bugList[$this->project][$this->version])){
                    $bugList[$this->project][$this->version]["total"] = 0;
                    $bugList[$this->project][$this->version]["active"] = $this->reportInfo["bugStatisticContent"];
                }else{
                    $bugList[$this->project] = array_merge($bugList[$this->project],array(
                        $this->version=>array(
                            "total"=>0,
                            "active"=>$this->reportInfo["bugStatisticContent"],
                        ),
                    ));
                }
                GEFile::saveFile($bugList,BUG_FILE);
                return $bugList[$this->project];
            }else{
                $bugList = array_merge($bugList,array(
                    $this->project=>array(
                        $this->version=>array(
                            "total"=>0,
                            "active"=>$this->reportInfo["bugStatisticContent"],
                        )
                    ),
                ));
                GEFile::saveFile($bugList,BUG_FILE);
                return $bugList[$this->project];
            }
        }else{
            return array();
        }
    }

    /*
     * 覆盖率的读写
     * */
    public function getCovList(){
        $covList = include COV_FILE;
        if($this->reportInfo["isAutoTest"]){
             if(isset($covList[$this->project])){
                    if(isset($covList[$this->project][$this->version])){
                        $covList[$this->project][$this->version] = $this->reportInfo["autoCov"];
                    }else{
                        $covList[$this->project] = array_merge($covList[$this->project],array(
                            $this->version=>$this->reportInfo["autoCov"],
                        ));
                    }
                 GEFile::saveFile($covList,COV_FILE);
                 return $covList[$this->project];
             }else{
                 $covList = array_merge($covList,array(
                     $this->project=>array(
                         $this->version=>$this->reportInfo["autoCov"],
                     ),
                 ));
                 GEFile::saveFile($covList,COV_FILE);
                 return $covList[$this->project];
             }
        }else{
            return array();
        }
    }

    private function getAutoTest(){
        $covList = $this->getCovList();
        $versions = array();
        $covs = array();
        foreach($covList as $version=>$cov){
            array_push($versions,$version);
            array_push($covs,$cov);
        }
        if($this->reportInfo["isAutoTest"]){
            return array(
//                "covs"=>array(28,34,63,58),
//                "versions"=>array("1.3.4","1.3.5","1.3.6","1.3.7"),
                "covs"=>$covs,
                "versions"=>$versions,
                "content"=>$this->reportInfo["autoContent"],
                "result"=>$this->reportInfo["autoResult"],
            );
        }else{
            return false;
        }
    }

    private function getManualTest(){
        if($this->reportInfo["isManualTest"]){
            return array(
                "content"=>$this->reportInfo["manulContent"],
                "result"=>$this->reportInfo["manulResult"],
            );
        }else{
            return false;
        }
    }

    private function getUtCase(){
        if($this->reportInfo["isUtCase"]){
            return array(
                "content"=>$this->getCovList(),
                "result"=>$this->reportInfo["utResult"],
            );
        }else{
            return false;
        }
    }

    private function getBugStatistic(){
        $bugList = $this->getBugList();
        $versions = array();
        $bugs = array();
        foreach($bugList as $version=>$bug){
            array_push($versions,$version);
            array_push($bugs,$bug["active"]);
        }
        if($this->reportInfo["isBugStatistic"]){
            return array(
//                "content"=>$this->getBugList(),
//                "bugs"=>array(28,34,63,58),
//                "versions"=>array("1.3.4","1.3.5","1.3.6","1.3.7"),
                "bugs"=>$bugs,
                "versions"=>$versions,
                "result"=>$this->reportInfo["bugStatisticResult"]
            );
        }else{
            return false;
        }
    }

    private function getFuns(){
        if($this->reportInfo["funs"]){
            return array(
                "funs"=>$this->reportInfo["funs"],
                "describes"=>$this->reportInfo["describes"],
            );
        }else{
            return false;
        }
    }
}

//$reportInfo = include BASE_SRC."control/data.php";
//$reportSimpleData = new ReportSimpleData($reportInfo);
//var_dump($reportSimpleData->getResult());