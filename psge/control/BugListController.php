<?php
include_once str_replace("\\","/",dirname(__FILE__))."/../env.php";
include_once BASE_SRC."model/TraceModel.class.php";

class BugListController{
    public static function getBugList(){

        $project = $_GET["project"];
        $startTime = $_GET["startTime"];
        $endTime = $_GET["endTime"];
        $rsolution = $_GET["rsolution"];

        $project_list = include PROJECT_LIST_FILE;
        $traceSpace = $project_list[$project]["trace"];
        $traceModules = $project_list[$project]["module"];


        $bugListAll = Trace::get(1000,$traceSpace,$traceModules);
        $startTime = strtotime(date('Y-m-d H:i:s',strtotime($startTime)));
        $endTime = strtotime(date('Y-m-d H:i:s',strtotime($endTime)));
        $bugList = array();
        $count = 0;
        foreach($bugListAll as $bugItem){
            $latesthistorytimestamp = strtotime($bugItem["latesthistorytimestamp"]);
            $stutas = $bugItem["status"];
            if($startTime<=$latesthistorytimestamp && $endTime>=$latesthistorytimestamp && $stutas == "Closed"){

                if($rsolution!="all" && $rsolution!=$bugItem["resolution"]){
                    continue;
                }
                $count++;
//                if($count<40 || $count>41){
//                    continue;
//                }
                  $summary = $bugItem["summary"];
                  $summary = preg_replace("/(script|style)/i","",$summary);
                  $bugList[] = array(
                      "summary"=>$summary,
                      "detail"=>$bugItem["detail"],
                      "assignedto"=>$bugItem["assignedto"] =="none"?$bugItem["resolveBy"]:$bugItem["assignedto"],
                      "loggedby"=>$bugItem["loggedby"],
                      "resolution"=>$bugItem["resolution"],
                  );
//                if($count ==39 || $count==40){
//                    var_dump(
//                        array(
//                            "summary"=>$bugItem["summary"],
//                            "detail"=>$bugItem["detail"],
//                            "assignedto"=>$bugItem["assignedto"] =="none"?$bugItem["resolveBy"]:$bugItem["assignedto"],
//                            "loggedby"=>$bugItem["loggedby"],
//                            "resolution"=>$bugItem["resolution"],
//                        )
//                    );
//                }
            }
        }
//        var_dump("count:"+$count);
        return $bugList;
    }
}
//$_GET["project"] = "ueditor";
//$_GET["startTime"] = "2013/04/08";
//$_GET["endTime"] = "2013/05/22";
//$_GET["rsolution"] = "all";
////BugListController::getBugList();
//var_dump((BugListController::getBugList()));
echo json_encode(BugListController::getBugList());
