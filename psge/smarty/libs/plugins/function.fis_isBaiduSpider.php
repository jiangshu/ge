<?php

function smarty_function_fis_isBaiduSpider($params, $smarty){
    $name = $params["name"];
    $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
    $botchar = "/(baiduspider)/i";
    $smarty->assign($name, preg_match($botchar, $ua));
}
