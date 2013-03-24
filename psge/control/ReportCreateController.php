<?php
include_once str_replace("\\","/",dirname(__FILE__)).("/../env.php");
include_once BASE_SRC."model/ProjectListModel.class.php";
$projectList = new ProjectListM();
$projects = $projectList ->getProjects();
