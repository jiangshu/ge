<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jiangshuguang
 * Date: 13-2-5
 * Time: 下午4:16
 * To change this template use File | Settings | File Templates.
 */

include_once dirname(__FILE__)."/../conf/config.php";

final class DataBase{

    /*
     * 连接数据库,适合查询多条记录
	 * return 返回数据库连接对象
     * */
    static function connect(){
        $db = new mysqli(
            Config::database_host,
            Config::database_user,
            Config::database_password,
            Config::database_name,
            Config::database_port
        );
        $db->query("SET NAMES 'UTF8'");
        return $db;
    }

    /*
     * 执行sql语句,适合查询单个返回结果
     * return 返回查询结果对象
     * */

    static function query($sql){
        $connect = self::connect();
        $res = $connect->query($sql);
        $res = gettype($res) == "object" ? $res->fetch_object() : $res;
        $connect ->close();
        return $res;
    }


    /**
     * 获取一个object list
     * @return 对象数组
     */
    static function queryAll($sql) {
        $connect = self::connect();
        $res = $connect->query($sql);
        if($res->num_rows <= 0){
            return array();
        }

        while($o = $res->fetch_object()) {
            $results[] = $o;
        }
        $connect ->close();
        return $results;
    }

    /**
     * 执行多条sql语句，如update、insert、create，以";"分隔
     * @param{string} $sql 多条查询语句
     */
    static function exec($sql) {
        $result = array();
        $connect = self::connect();
        $lines = explode(";", $sql);
        foreach($lines as $line) {
            $line = str_replace('#u003B', ';', $line);
            $line = trim($line);
            if (!$line) continue;
            $result[] = $connect->query($line);
        }
        $connect->close();
        return $result;
    }



    static function search_single_table($db, $sql, $table, $column, $word, $start, $limit, $count) {
        if($count) {
            return "From $table where $column like '%$word%'";
        } else {
            $query = $sql . " From $table where $column like '%$word%'";
            return $query;
        }
    }


   /*
    *
    *
    * */
    public static function count($db, $sql) {
        $query = 'select count(*) as count '.$sql;
        $result = $db->query($query);
        if(empty($result)) {
            return 0;
            exit;
        }
        $count = $result->fetch_object();
        $result->free();
        return $count->count;
    }


    public static function bind_array_params(&$stmt, $types, $values) {
        $ags = array();
        $ags[] = $types;
        $ags = array_merge($ags, $values);
        return call_user_func_array(array($stmt, "bind_param"), $ags);
    }
}