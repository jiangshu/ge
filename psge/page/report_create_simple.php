<?php
include_once "../control/ReportCreateController.php";
?>

<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../static/common/common.css"/>
    <link rel="stylesheet" type="text/css" href="../static/lib/magic/css/magic.Calendar.css"/>
    <link rel="stylesheet" type="text/css" href="../static/page/report_create/report_create_simple.css"/>
    <script type="text/javascript" src="../static/lib/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="../static/common/common.js"></script>
<!--    <script type="text/javascript" src="../static/lib/magic/js/magic.js"></script>-->
    <script type="text/javascript" src="../static/page/report_create/report_create_simple.js"></script>
</head>

<body>
<?php $smarty->display("widget/header/header.tpl")?>

<div class="body">
    <div class="page_title">填写测试数据</div>
    <div class="report_create">
        <form action="../control/ReportSimpleController.php" method="POST" id="projectform" target="_blank">
            <!--       <table align="center"  rules="rows" cellpadding="20" cellspacing="0" border="1" width="800"  frame="vsides">-->
            <div style="width:800px;margin-left:auto;margin-right:auto">
                <div class="main_title">项目名称：</div>
                <div class="main_content">
                    <select name="project"  id="project">
                        <?php foreach($projects as $project){ ?>
                        <option><?php echo $project ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="main_title">项目版本：</div>
                <div class="main_content">
                    <input type="text" name="version" class="version" id="version"/>
                </div>


                <div class="main_title">升级的功能点：</div>
                <div class="main_content">
                    <table align="center" cellpadding="10" cellspacing="20"  width="600" style="border-collapse:collapse;margin-left:0;font-size:14px">
                        <tr>
                            <td>
                                功能点：<input type="text" class="fun_index" name="fun0" style="width:510px;margin-bottom: 5px"/>
                                详细描述：<textarea rows="4" class="describe1_index" name="describe0" cols="70"></textarea>
                            </td>
                            <td>
                                <div class="sub">-</div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div class="plus">+</div>
                            </td>
                        </tr>
                    </table>
                </div>


                <div class="main_title">报告内容：</div>
                <div class="main_content">
                    <table align="center" cellpadding="15" cellspacing="20"  width="650" style="border-collapse:collapse;margin-left:0;font-size:14px">
                        <tr>
                            <td width="30%"><input type="checkbox" name="is_auto_test"  />自动化case</td>
                            <td width="70%">
                                <div>
                                    覆盖率：<input type="text" name="autoCov" style="width:60px"/> %
                                </div>
                                <div>
                                    具体内容：<textarea  rows="3" cols="60" name="autoContent" style="border-color: #ffd833"></textarea>
                                </div>
                                <div>
                                    结论：<textarea  rows="5" cols="60" name="autoResult" >所有case都已经通过</textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="is_manual_test"  />手工测试</td>
                            <td>
                                <div>
                                    具体内容：<textarea  rows="3" cols="60" name="manulContent" style="border-color: #ffd833"></textarea>
                                </div>
                                <div>
                                    结论： <textarea  rows="4" cols="60" name="manulResult" >所有手工测试都已经通过</textarea>
                                </div>
                            </td>
                        </tr>
<!--                        <tr>-->
<!--                            <td><input type="checkbox" name="is_ut_case"  />单测覆盖率</td>-->
<!--                            <td>-->
<!--                                <div>-->
<!--                                    覆盖率：<input type="text" name="utContent" style="width:60px"/> %-->
<!--                                </div>-->
<!--                                <div>-->
<!--                                    结论：<textarea  rows="4" cols="60" name="utResult" >已经全部通过</textarea>-->
<!--                                </div>-->
<!--                            </td>-->
<!--                        </tr>-->
                        <tr>
                            <td> <input type="checkbox" name="is_bug_statistic" />active bug</td>
                            <td>
                                <div>
                                    active bug个数：<input type="text" name="bugStatisticContent" style="width:60px"/> 个
                                </div>
                                <div>
                                    结论： <textarea  rows="4" cols="60" name="bugStatisticResult" >active bug正常</textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="main_title">测试结论：</div>
                <div class="main_content">
                    <textarea  rows="6" cols="80" name="result">所有case都已经通过</textarea>
                </div>

                <div class="main_title">效率数据：</div>
                <div class="main_content">
                    <textarea  rows="6" cols="80" name="effi"></textarea>
                </div>

                <div class="main_title">补充说明：</div>
                <div class="main_content">
                    <textarea  rows="6" cols="80" name="declaration"></textarea>
                </div>

                <div style="text-align: right">
                    <input type="submit" id="submit" class="submit" value="预览测试报告"/>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="switch">
        <a href="report_create.php">切换到一般版</a>
</div>
</body>
</html>