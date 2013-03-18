<?php
class GEFile{

    public static function saveFile($data,$file){
        if(file_exists($file)){
            unlink($file);
        }
        $str_content = "<?php return ".var_export($data,TRUE).";";
        file_put_contents($file,$str_content);
    }
}