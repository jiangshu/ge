<?php
include_once str_replace("\\","/",dirname(__FILE__)).("/../env.php");
include_once BASE_SRC."model/ProjectListModel.class.php";

class ProjectList{
    public $projectListM;
    public $tpl;

    public function __construct(){
        $this->projectListM = new ProjectListM();
        $this->tpl = BASE_SRC."static/page/project_list/modify_tpl.html";
    }

    public function doAction(){
        if(isset($_POST["action"]) && $_POST["action"] == "modify"){
            $project_name = $_POST["project_name"];
            $version = $_POST["version"];
            $info = $_POST["info"];
            $space = $_POST["space"];
            $module = $_POST["module"];
            $mailto = $_POST["mailto"];
            $mailgroup = $_POST["mailgroup"];

            $merge_data = array(
                $project_name => array(
                    "new_version"=> $version ,
                    "info" => $info,
                    "trace" => $space,
                    "module" => $module,
                    "mailto" => $mailto,
                    "mailgroup" => $mailgroup,
                )
            );
            $this->projectListM ->mergeData($merge_data,$project_name);
        }else if(isset($_GET["action"]) && $_GET["action"] == "delete"){
            $project_name = $_GET["project_name"];
            $this->projectListM->deleteProject($project_name);
            header("location:./project_list.php");
        }
    }

    /*
     * 带删除按钮的list；
     * */
    public  function getList(){
        $listData = array();
        $projectList = $this->projectListM->getListData();
        foreach($projectList as $project_name => $project_info){
            $project_info = array_merge($project_info,array("delete" =>"<a href='./project_list.php?action=delete&project_name=".$project_name."'>删除</a>"));
            $listData = array_merge($listData,array($project_name =>$project_info));
        }
        return $listData;
    }

    /*
     * 不带删除按钮的list
     * */
    public function getSimpleList(){
          return $this->projectListM->getListData();
    }

    public function getProjectTpl(){
        return preg_replace("/\n|\r|\n\r/","",file_get_contents($this->tpl));
    }
}


//$projectList  = new ProjectList();
//var_dump($projectList->getList());