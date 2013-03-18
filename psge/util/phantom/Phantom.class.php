<?php

class Phamtom{
    public static function createPicture($url,$savePath){
        $curPath = dirname(__FILE__);
        $js = $curPath."/create_picture.js";
        $command = self::getPhantom()." $js $url $savePath";
        PassThru($command);
    }

    public static function getPhantom(){
        $curPath = dirname(__FILE__);
        $command = "";
        if(strtolower(PHP_OS) == 'linux'){
            $command = 'phantomjs';
        }else{
            $command =$curPath."/Phantomjs.exe";
        }
        return $command;
    }
}


