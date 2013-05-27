<?php
include_once("../control/ProjectListController.php");
$projectList = new ProjectList();
$projectList->doAction();
?>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../static/common/common.css"/>
    <link rel="stylesheet" type="text/css" href="../static/page/project_list/project_list.css"/>
    <script type="text/javascript" src="../static/lib/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="../static/common/common.js"></script>
    <script type="text/javascript" src="../static/lib/template/template.js"></script>
    <script type="text/javascript" src="../static/page/project_list/project_list.js"></script>

</head>
<body>
<?php
  $smarty->display("widget/header/header.tpl")
?>

   <div class="project_list">
        <table align="center" cellpadding="3" width="100%" border="1" style=" border-collapse:collapse;table-layout: fixed;word-break: break-all;">
            <tr bgcolor="#2185ff" style="color:#fff">
                <td width="10%">项目名称</td>
                <td width="10%">TRACE空间</td>
                <td width="17%">TRACE模块</td>
                <td width="12%">CI IP及端口</td>
                <td width="18%">报告收件人</td>
                <td width="18%">报告抄送组</td>
                <td width="5%">删除</td>
                <td width="5%">查看</td>
                <td width="5%">修改</td>
            </tr>
            <?php foreach($projectList->getList() as $project=>$data){?>
                <tr>
                    <td><?php echo $project?></td>
                    <td><?php echo $data["trace"]?></td>
                    <td><?php echo $data["module"]?></td>
                    <td><?php echo $data["ip_port"]?></td>
                    <td>
                    <?php
                        $i=0;
                        $mailto = explode(";",$data["mailto"]);
                        foreach($mailto as $key =>$person){
                            if(!$i){
                                echo "<div style='color:#1751A1'>$person</div>";
                            }else{
                                echo "<hr style='margin-right:20px;border:1px dashed #AAAAAA;'/>";
                                echo "<div style='color:#A81D0D'>$person</div>";
                            }
                            $i=1;
                        }
                     ?>
                    <td>
                    <?php
                        $i=0;
                        $mailGroup = explode(";",$data["mailgroup"]);
                        foreach($mailGroup as $person){
                            if(!$i){
                                echo "<div style='color:#1751A1'>$person</div>";
                            }else{
                                echo "<hr style='margin-right:20px;border:1px dashed #AAAAAA;'/>";
                                echo "<div style='color:#A81D0D'>$person</div>";
                            }
                            $i=1;
                    }
                    ?>
                    </td>
                    <td><div class="list_button delete"><?php echo $data["delete"]?></div></td>
                    <td><div class="list_button browser"><?php echo "查看"?></div></td>
                    <td><div class="list_button modify"><?php echo "修改"?></div></td>
                </tr>
            <?php }?>
        </table>
   </div>

<div class="mask"></div>

<div class="browser_content">
    <h1>显示进度 和bug详细信息</h1>
    <h2>正在开发中。。。</h2>
</div>

<div>
    <div></div>
    <div></div>
</div>

<script type="text/javascript">
   var project_list,modify_tpl,tpl_fun;
   project_list = '<?php echo json_encode($projectList->getSimpleList())?>';
   project_list = JSON.parse(project_list); console.log(project_list);
   modify_tpl = '<?php echo $projectList->getProjectTpl() ?>';
   tpl_fun = baidu.template(modify_tpl);

   $(".modify").click(function(){
       var width = $(window).width(),
           height = $(window).height();
       $(".mask").show();
       $project_name = $(this).parent().parent().children().eq(0).html();
       $project_info = project_list[$project_name];
       $project_data = {
           project:$project_name,
           version:$project_info["version"],
           module: $project_info["module"],
           new_version: $project_info["new_version"],
           trace: $project_info["trace"],
           ip_port:$project_info["ip_port"],
           mailto: $project_info["mailto"],
           mailgroup: $project_info["mailgroup"]
       };

       $(tpl_fun($project_data)).appendTo("body").css("top",(height-450)/2).css("left",(width-600)/2).show(400);
       $("#close").click(function(){
           $(".project_modify").remove();
           $(".mask").hide();
       })
   });

    $(".browser").click(function(){
        var width = $(window).width(),
            height = $(window).height();
         $(".browser_content").css("height",height-80).css("width",width-70).show().click(function(){
             $(this).hide();
         });
    });
</script>

</body>

</html>
