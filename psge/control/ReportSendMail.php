<?php
include_once str_replace("\\","/",dirname(__FILE__))."/../conf/config.php";
include_once str_replace("\\","/",dirname(__FILE__))."/../smarty/config.php";
include_once str_replace("\\","/",dirname(__FILE__))."/../util/mail/Mail.class.php";

$file = $_GET["file"];
$result = Mail::template_send($file);
echo $result;

