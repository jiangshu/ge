<?php
include_once "../control/ReportCreateController.php";
?>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../static/common/common.css"/>
    <link rel="stylesheet" type="text/css" href="../static/page/bug_list/bug_list.css"/>
    <link rel="stylesheet" type="text/css" href="../static/lib/magic/css/magic.Calendar.css"/>
    <script type="text/javascript" src="../static/lib/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="../static/common/common.js"></script>
    <script type="text/javascript" src="../static/lib/magic/js/magic.js"></script>
    <script type="text/javascript" src="../static/page/bug_list/bug_list.js"></script>

</head>
<body>
    <?php
    $smarty->display("widget/header/header.tpl")
    ?>

   <div class="bug_list">
         <div class="bug_config">
              <div class="config_item">
                  项目名称：
                  <select name="project"  id="project">
                      <?php foreach($projects as $project){ ?>
                      <option><?php echo $project ?></option>
                      <?php } ?>
                  </select>
              </div>
              <div class="config_item">
                  开始时间：<input type="text" id="startTime"/>
              </div>
             <div class="config_item">
                 结束时间：<input type="text" id="endTime"/>
             </div>
             <div class="config_item">
                 Resolution:
                 <select name="project"  id="rsolution">
                     <option>all</option>
                     <option>Fixed</option>
                     <option>Not a bug</option>
                     <option>External</option>
                     <option>By Design</option>
                     <option>Fixed In Future</option>
                     <option>Won't Fix</option>
                     <option>Not Repro</option>
                </select>
             </div>
             <div style="text-align: right">
                 <button id="doStatistic">统计</button>
             </div>
         </div>
         <div class="bug_result">
               <table align="center" cellpadding="3" width="100%" border="1" style=" border-collapse:collapse;table-layout: fixed;word-break: break-all;background: #ffffff">
               </table>
         </div>
   </div>
   <div class="loading"></div>

</body>

</html>
