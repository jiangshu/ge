<?php
include_once("../control/ProjectListController.php");
?>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../static/common/common.css"/>
    <link rel="stylesheet" type="text/css" href="../static/page/project_list/project_list.css"/>
    <script type="text/javascript" src="../static/lib/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="../static/common/common.js"></script>
    <script type="text/javascript" src="../static/page/project_list/project_list.js"></script>
</head>
<body>
<?php
  $smarty->display("widget/header/header.tpl")
?>

   <div class="project_list">
        <table align="center" cellpadding="3" width="100%" border="1" style=" border-collapse:collapse;">
            <tr bgcolor="#2185ff" style="color:#fff">
                <td>项目名称</td>
                <td>TRACE空间</td>
                <td>TRACE模块</td>
                <td>报告收件人</td>
                <td>报告抄送组</td>
                <td>查看</td>
                <td>修改</td>
            </tr>
            <?php foreach($project_list as $project=>$data){?>
                <tr>
                    <td><?php echo $project?></td>
                    <td><?php echo $data["trace"]?></td>
                    <td><?php echo $data["module"]?></td>
                    <td><?php echo $data["mail"][0]?></td>
                    <td><?php echo $data["mail"][0]?></td>
                    <td><?php echo "查看"?></td>
                    <td><?php echo "修改"?></td>
                </tr>
            <?php }?>
        </table>
   </div>


<div class="project_modify">
    <table align="center" width="400px" cellpadding="5px">
        <tr><td width="25%"> 项目名称：</td><td><input id="project_name" name="project_name" class="name" type="text"/></td></tr>
        <tr><td> 最新版本：</td><td><input id="version" name="version" class="version" type="text" value="1.0.0.0"/></td></tr
        <tr><td> 项目简介：</td><td><textarea name="info" id="info"></textarea></td></tr>
        <tr><td> TRACE空间：</td><td><input type="text" id="space" name="space"  value="PUBLICGE"></td></tr>
        <tr><td> TRACE模块：</td><td><input type="text" name="module" id="module"   value="public/ge/gaea"></td></tr>
        <tr><td> 邮件组：</td><td>
                <table>
                    <tr><td>收件人：</td></tr>
                    <tr><td><input type="text" name="mailto"></td></tr>
                    <tr><td>抄送：</td></tr>
                    <tr><td><input type="text" name="mailgroup"></td></tr>
                </table>
            </td>
        </tr>
        <tr><td></td><td align="right"><div class="ge_button">确定</div></td></tr>
    </table>
</div>


<script type="text/javascript">
   var project_list = '<?php echo json_encode($project_list);?>';
   project_list = JSON.parse(project_list);


   console.log(project_list["fis-pc"]);
</script>

</body>

</html>
