<?php
/*
 * auth:jiangshuguang
 * */

class ParseDiff{
    static public function getDiff($url=""){
        $connect = curl_init();
        curl_setopt($connect, CURLOPT_URL,$url);
        curl_setopt($connect, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($connect, CURLOPT_RETURNTRANSFER, 1);
        $datas = curl_exec($connect);
        curl_close($connect);
        return json_decode($datas,true);
    }
}

//var_dump(ParseDiff::getDiff("http://10.48.30.87:8088/ge_report/diff.php?project=fis-pc"));