<?php

include_once dirname(__FILE__)."/../env.php";

class ssi{
    public static function ssii()
    {
        echo "*******";
    }
}

$smarty->registerClass("ssi", "ssi");

$smarty->display("test/test.tpl");