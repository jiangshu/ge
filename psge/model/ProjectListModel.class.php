<?php

include_once str_replace("\\","/",dirname(__FILE__))."/../env.php";
include_once BASE_SRC."util/File.class.php";

class ProjectListM{
    private $project_list_file;
    private $prject_list_data;
    public function __construct(){
        $this->project_list_file = BASE_SRC."model/data/project_list.php";
        if(file_exists($this->project_list_file)){
            $this->prject_list_data = include($this->project_list_file);
        }else{
            $this->prject_list_data = array();
        }
    }

    public function getListData(){
        return $this->prject_list_data;
    }


    public function getMailto($project_name){
        return $this->prject_list_data[$project_name]["mailto"];
    }

    public function getProjects(){
        $projects = array();
        foreach($this->prject_list_data as $project_name=>$info){
             $projects[] = $project_name;
        }
        return $projects;
    }

    /*
     * 获取某个项目的信息
     * */
    public function getProject($prject_name){
         if(isset($this->prject_list_data[$prject_name])){
             return $this->prject_list_data[$prject_name];
         }
         return $this->prject_list_data[str_replace("_","-",$prject_name)];
    }

    public function mergeData($merge_data,$project_name){
         $project_list_data = $this->prject_list_data;
         if(count($project_list_data)>0){
             if(array_key_exists($project_name,$project_list_data)){
                  unset($project_list_data[$project_name]);
             }
          }

         $project_list_data = array_merge($project_list_data,$merge_data);
         $this->prject_list_data = $project_list_data;
         GEFile::saveFile($project_list_data,$this->project_list_file);
    }

    public function deleteProject($project_name){
        $project_list_data = $this->prject_list_data;
        unset($project_list_data[$project_name]);
        $this->prject_list_data = $project_list_data;
        GEFile::saveFile($project_list_data,$this->project_list_file);
    }
}

//$projectList = new ProjectListM();
//var_dump($projectList->getProject("fis-pc"));
//var_dump($projectList->getListData());

