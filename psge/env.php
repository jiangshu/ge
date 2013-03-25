<?php
ob_start();
if(!defined("BASE_SRC")) define("BASE_SRC",str_replace("\\","/",dirname(__FILE__))."/");
include_once(BASE_SRC."conf/config.php");
include_once(BASE_SRC."smarty/config.php");
ob_end_clean();