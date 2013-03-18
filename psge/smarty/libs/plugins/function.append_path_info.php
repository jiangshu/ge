<?php
function query_encode($queryArr=array()) {
    $query = array();
    foreach($queryArr as $k=>$v){
        $query[] = $k.'='.htmlspecialchars($v);
    }
    return $query;
}

function smarty_function_append_path_info($params, $template) {
    $query = query_encode($template->tpl_vars['params']->value);
    $queryStr = implode('&amp;',$query);
    if(strpos($params['url'],'?') === false){
        $queryStr = '?' . $queryStr;
    }else{
        $queryStr = '&amp;' . $queryStr;
    }
    $fragmentPos = strpos($params['url'],'#');
    if($fragmentPos === false){
        $result = $params['url'] . $queryStr;
    }else{
        $tokens = explode($params['url'], '#', 2);
        $result = $tokens[0] . $queryStr . $tokens[1];
    }
    return  $result;
}