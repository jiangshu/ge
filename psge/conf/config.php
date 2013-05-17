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
        define("BASE_URL","http://10.48.30.87:8088/ge/");
    }else{
        define("BASE_URL","http://172.22.184.84/mobile/ge/");
    }
}

if(!defined("TRACE_URL")) define("TRACE_URL","http://icafe.baidu.com:8100/jtrac/open");
if(!defined("PAGE_SIZE")) define("PAGE_SIZE",1000);
if(!defined("DIFF_FILE")) define("DIFF_FILE",BASE_SRC."/model/data/diff.php");

if(!defined("COV_FILE")) define("COV_FILE",BASE_SRC."../data/cov.php");
if(!defined("BUG_FILE")) define("BUG_FILE",BASE_SRC."../data/bug.php");
if(!defined("PROJECT_LIST_FILE")) define("PROJECT_LIST_FILE",BASE_SRC."../data/project_list.php");

if(!defined("COV_FILE_BAK")) define("COV_FILE_BAK",BASE_SRC."../data/bak/cov.php");
if(!defined("BUG_FILE_BAK")) define("BUG_FILE_BAK",BASE_SRC."../data/bak/bug.php");
if(!defined("PROJECT_LIST_FILE_BAK")) define("PROJECT_LIST_FILE_BAK",BASE_SRC."../data/bak/project_list.php");

if(!defined("REPORT_FULL_PATH")) define("REPORT_FULL_PATH",BASE_SRC."../report_full_result");
if(!defined("REPORT_SIMPLE_PATH")) define("REPORT_SIMPLE_PATH",BASE_SRC."../report_simple_result");

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