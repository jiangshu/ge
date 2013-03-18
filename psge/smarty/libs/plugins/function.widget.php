<?php
function smarty_function_widget($params, Smarty_Internal_Template $template){
    if (isset($params['path'])) {
        $path = $params['path']; 
    } else {
        throw new Exception("widget path参数不能为空[{$template->source->filepath}]");
    }
    unset($params['path']);
    $fn = 'smarty_template_function_fis_' . strtr(substr($path, 0, strrpos($path, '/')), '/', '_');
    if(function_exists($fn)){
        return $fn($template, $params);
    } else {
        $output = $template->getSubTemplate($path, $template->cache_id, $template->compile_id, null, null, $params, Smarty::SCOPE_LOCAL);
        if(function_exists($fn)){
            return $fn($template, $params);
        } else {
  	        //如果有fis_render参数，去除widget内的有标签的textarea，外部包裹textarea
            //包裹的textarea为 {%*FIS_RENDER_START*%}<textarea> blablabla  </textarea>{%*FIS_RENDER_END*%}
            if(isset($params['fis_render'])) {
                $textarea_ld = '<!--(==[FIS_RENDER_START==])-->' .'<textarea class="fis-datalazyload" style="visibility:hidden;">';
                $textarea_rd = '</textarea>' . '<!--(==[FIS_RENDER_END]==)-->';
                $output = str_replace(array($textarea_ld, $textarea_rd), '', $output);
                //对重新添加textarea的内容进行转义
                $output = escapeRender($output);
                $output = $textarea_ld . $output . $textarea_rd;
            }
            return $output;
        }
    }
}
/**
 * 对textarea中的内容进行转义
 * @param $str
 * @return mixed
 */
function escapeRender($str) {
    $str = strval($str);
    $str = preg_replace('/&lt;(?!\/textarea)/', '&amp;lt;', $str);
    return str_replace(array( "&gt;", "</textarea"), array("&amp;gt;", "&lt;/textarea"), $str);
}
