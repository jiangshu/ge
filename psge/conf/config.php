<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jiangshuguang
 * Date: 13-2-5
 * Time: 下午3:48
 * To change this template use File | Settings | File Templates.
 */
if(!defined("BASE_SRC")) define("BASE_SRC",str_replace("\\","/",dirname(__FILE__))."/../");
if(!defined("BASE_URL")){
    if(strtolower(PHP_OS) == 'linux'){
        define("BASE_URL","http://10.48.30.87:8088/ge/psge/page/");
    }else{
        define("BASE_URL","http://localhost/mobile/ge/psge/");
    }
}
if(!defined("TRACE_URL")) define("TRACE_URL","http://icafe.baidu.com:8100/jtrac/open");
if(!defined("PAGE_SIZE")) define("PAGE_SIZE",1000);
if(!defined("COV_FILE")) define("COV_FILE",BASE_SRC."/model/data/cov.php");
if(!defined("DIFF_FILE")) define("DIFF_FILE",BASE_SRC."/model/data/diff.php");
if(!defined("PROJECT_LIST_FILE")) define("PROJECT_LIST_FILE",BASE_SRC."/model/data/project_list.php");

/*
 * 数据库配置
 * */
final class Config{
    const database_host = "127.0.0.1";
    const database_user = "root";
    const database_password = "";
    const database_name = "report";
    const database_port = 3306;
    const fis_url = "http://10.48.30.87:8088/ge_report/";
}