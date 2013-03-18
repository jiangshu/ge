<?php
//define('BASE_PATH',$_SERVER['DOCUMENT_ROOT']);				//定义服务器的绝对路径
define('BASE_PATH',dirname(__FILE__)."/../");				    //定义服务器的绝对路径
define('SMARTY_PATH','/smarty/');					            //定义Smarty目录的绝对路径
require BASE_PATH.SMARTY_PATH.'libs/Smarty.class.php';		    //加载Smarty类库文件
$smarty = new Smarty;											//实例化一个Smarty对象
$smarty->template_dir = BASE_PATH.'view/';	    //定义模板文件存储位置
$smarty->compile_dir = BASE_PATH.SMARTY_PATH.'templates_c/';	//定义编译文件存储位置
$smarty->config_dir = BASE_PATH.SMARTY_PATH.'configs/';			//定义配置文件存储位置
$smarty->cache_dir = BASE_PATH.SMARTY_PATH.'cache/';			//定义缓存文件存储位置
/*  定义定界符  */
$smarty->left_delimiter = '{%';
$smarty->right_delimiter = '%}';
?>
