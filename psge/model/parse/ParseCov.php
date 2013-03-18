<?php
/*
 * auth:jiangshuguang
 * */

include_once str_replace("\\","/",dirname(__FILE__))."/../../conf/config.php";

class ParseCov{
    /*
     * 解析覆盖率的xml文件，得到覆盖率
     * 例如覆盖率结果为68.1%，返回的结果为68.1
     * */

//    static public function getCov($xmlFile=""){
//        if(file_exists($xmlFile)){
//            $doc = new DOMDocument();
//            $doc->load($xmlFile);
//            $xpath = new DOMXPath($doc);
//            $nodes = $xpath->evaluate('/coverage/project/metrics');
//            $statements = $nodes-> item(0)-> getAttribute( 'statements');
//            $coveredstatements = $nodes-> item(0)-> getAttribute( 'coveredstatements');
//            $coverage = $coveredstatements/$statements*100;
//            $coverage = number_format($coverage, 1, '.', '');
//            return $coverage;
//        }
//        return 0;
//    }

    static public function getCov($url=""){
        $connect = curl_init();
        curl_setopt($connect, CURLOPT_URL,$url);
        curl_setopt($connect, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($connect, CURLOPT_RETURNTRANSFER, 1);
        $datas = curl_exec($connect);
        curl_close($connect);
        return $datas;
    }
}

//var_dump(ParseCov::getCov("http://10.48.30.87:8088/ge_report/cov.php?project=fis-pc"));




