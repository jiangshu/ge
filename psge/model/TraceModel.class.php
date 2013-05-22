<?php
include_once str_replace("\\","/",dirname(__FILE__))."/DataBase.php";
include_once str_replace("\\","/",dirname(__FILE__))."/../conf/config.php";

class Trace{
    private $argument=
        array(
            "url"=>0,
            "method"=>"",
            "space"=>"",
            "module"=>"",
            "pageSize"=>"",
        );
    public function __construct($argument){
        $this->argument = $argument;
    }

    public static function get($size=1000,$space="PUBLICGE",$module="public/ge/gaea"){
        $para = "?method=simpleMoreQuery&space=$space&module=$module&pageSize=$size";
        $url = "http://icafe.baidu.com:8100/jtrac/open".$para;
        $connect = curl_init();
        curl_setopt($connect, CURLOPT_URL,$url);
        curl_setopt($connect, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($connect, CURLOPT_RETURNTRANSFER, 1);
        $datas = curl_exec($connect);
        curl_close($connect);
        if(!$datas){
            return array(false, curl_error($connect));
        }else{
            $datas = json_decode($datas,true);
            $datas = $datas["items"];
            $bugs = array();
            foreach($datas as $data){
                array_push($bugs,
                    array(
                        "bugid"=>Trace::getNumber($data["id"]),
                        "summary"=>Trace::getString($data["summary"]),
//                        "summary"=>"summary",
                        "detail"=>Trace::getString($data["detail"]),
                        "assignedto"=>Trace::getString($data["assignedTo"]),
                        "resolveBy"=>Trace::getString($data["resolveBy"]),
                        "loggedby"=>Trace::getString($data["loggedBy"]),
                        "itemusers"=>Trace::getString($data["itemUsers"]),
                        "status"=>Trace::getString($data["status"]),
                        "version"=>Trace::getString($data["Build"]),
//                        "fixVersion"=>$data["Fixed Build"],
                        "resolution"=>isset($data["Resolution"])?Trace::getString($data["Resolution"]):"none",
                        "fixVersion"=>"future",
                        "timestamp"=>Trace::getTime($data["timeStamp"]),
                        "latesthistorytimestamp"=>Trace::getTime($data["latestHistory.timeStamp"])
                    )
                );
            }
            return $bugs;
        }
    }

    private static function getNumber($val){
        if(isset($val) && $val!=""){
            return $val;
        }else{
            return 0;
        }
    }

    private static function getString($val){
        if(isset($val)  && $val!=""){
            return $val;
        }else{
            return "none";
        }
    }

    private static function getTime($val){
        if(isset($val)  && $val!=""){
            return date('Y-m-d H:i:s',strtotime($val));
        }else{
            return date('Y-m-d H:i:s',strtotime("0/0/0"));
        }
    }
}
//Trace::get($size=30,$space="PUBLICGE",$module="public/ge/gaea/fis-pc");
//var_dump(Trace::get($size=300,$space="PUBLICGE",$module="public/ge/gaea/fis-pc"));


