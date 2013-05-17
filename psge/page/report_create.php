<?php
   include_once "../control/ReportCreateController.php";
?>

<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../static/common/common.css"/>
    <link rel="stylesheet" type="text/css" href="../static/lib/magic/css/magic.Calendar.css"/>
    <link rel="stylesheet" type="text/css" href="../static/page/report_create/report_create.css"/>
    <script type="text/javascript" src="../static/lib/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="../static/common/common.js"></script>
    <script type="text/javascript" src="../static/lib/magic/js/magic.js"></script>
    <script type="text/javascript" src="../static/page/report_create/report_create.js"></script>
</head>

<body>
<?php $smarty->display("widget/header/header.tpl")?>

<div class="body">
   <div class="page_title">填写测试数据</div>
   <div class="report_create">
     <form action="../control/ReportController.php" method="POST" id="projectform" target="_blank">
<!--       <table align="center"  rules="rows" cellpadding="20" cellspacing="0" border="1" width="800"  frame="vsides">-->
       <table align="center" cellpadding="10" cellspacing="0" width="800"  >
           <tr>
               <td width="20%"  class="main_title">项目名称：</td>
               <td width="80%">
                   <select name="project"  id="project">
                       <?php foreach($projects as $project){ ?>
                       <option><?php echo $project ?></option>
                       <?php } ?>
                   </select>
               </td>
           </tr>


           <tr>
               <td class="main_title">版本：</td>
               <td>
                   <input type="text" name="version" class="version" id="version"/>
               </td>
           </tr>


           <tr>
               <td class="main_title">时间段：</td>
               <td>
                   <input type="text" id="start_time" name="start_time" placeholder="开始时间"/>
                   <input type="text" id="end_time" name="end_time" placeholder="结束时间"/>
               </td>
           </tr>


           <tr>
               <td class="main_title">升级的功能点：</td>
               <td>

                       <div style="margin-bottom:5px;">
                           <input type="text" name="fun0"  class='fun_index' placeholder="升级的功能描述" style="width:60%;"/>
                           <input type="text" name="key0"  class='key_index' placeholder="功能描述关键字" style="width:30%;"/>
                           <div class="sub">-</div>
                       </div>
                       <div class="plus">+</div>

               </td>
           </tr>



           <tr>
               <td class="main_title">报告内容：</td>
               <td>
                   <table align="center" cellpadding="10" cellspacing="20"  width="600" style="border-collapse:collapse;margin-left:0;font-size:14px">
                       <tr>
                           <td width="25%">1.是否diff</td>
                           <td width="75%">
                               <input type="checkbox" name="isdiff" checked />
                               <textarea  rows="4" cols="55" name="diffResult" >diff结论</textarea>
                           </td>
                       </tr>
                       <tr>
                           <td>2.是否单测覆盖率</td>
                           <td>
                               <input type="checkbox" name="iscov" checked />
                               <textarea  rows="4" cols="55" name="covResult" >覆盖率说明</textarea>
                           </td>
                       </tr>
                       <tr>
                           <td>3.CI/Sample自动化</td>
                           <td>
                               <input type="checkbox" name="is_CI_Sample"  />
                               <textarea  rows="4" cols="55" name="CI_Sample" style="display: none" >已经全部通过</textarea>
                           </td>
                       </tr>
                       <tr>
                           <td>4.是否在编译机上运行</td>
                           <td>
                               <input type="checkbox" name="isCompile" />
                               <textarea  rows="4" cols="55" name="compile" style="display: none" >在编译机上运行通过</textarea>
                           </td>
                       </tr>
                       <tr>
                           <td>5.新增case统计</td>
                           <td>
                               <input type="checkbox" name="isCaseStatistic"  />
                               <textarea  rows="4" cols="55" name="caseStatistic" style="display: none">新增单测/系统case/sample自动化case情况</textarea>
                           </td>
                       </tr>
                       <tr>
                           <td>6.Start.sh脚本</td>
                           <td>
                               <input type="checkbox" name="isStartScript"  />
                               <textarea  rows="4" cols="55" name="startScript" style="display: none">在windows和linux下运行正常</textarea>
                           </td>
                       </tr>
                   </table>
               </td>
           </tr>



           <tr>
               <td class="main_title">测试结论：</td>
               <td>
                   <textarea  rows="6" cols="80" name="result">所有case都已经通过</textarea>
               </td>
           </tr>



           <tr>
               <td class="main_title">效率数据：</td>
               <td>
                   <textarea  rows="6" cols="80" name="effi">按期发布</textarea>
               </td>
           </tr>



           <tr>
               <td class="main_title">补充说明：</td>
               <td>
                   <textarea  rows="6" cols="80" name="declaration"></textarea>
               </td>
           </tr>



           <tr>
               <td></td>
               <td align="right"><input type="submit" id="submit" class="submit" value="预览测试报告"/></td>
           </tr>

       </table>
     </form>
   </div>
</div>
<div class="switch">
    <a href="report_create_simple.php">切换到简单版</a>
</div>
</body>
</html>