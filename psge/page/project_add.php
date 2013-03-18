<?php
   include_once("../env.php");
?>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../static/common/common.css"/>
    <link rel="stylesheet" type="text/css" href="../static/page/project_add/project_add.css"/>
    <script type="text/javascript" src="../static/lib/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="../static/common/common.js"></script>
    <script type="text/javascript" src="../static/page/project_add/project_add.js"></script>
</head>

<body>

<?php $smarty->display("widget/header/header.tpl")?>

<div class="body">
    <div class="project_add">
        <form action="../control/ProjectAddController.php" method="post" id="project_add" >
            <table align="center" width="500px" cellpadding="5px">
                <tr >
                    <td width="25%">
                        项目名称：
                    </td>
                    <td>
                        <input id="project_name" name="project_name" class="name" type="text"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        最新版本：
                    </td>
                    <td>
                        <input id="version" name="version" class="version" type="text" value="1.0.0.0"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        项目简介：
                    </td>
                    <td>
                        <textarea name="info" id="info"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        TRACE空间：
                    </td>
                    <td>
                        <input type="text" id="space" name="space"  value="PUBLICGE">
                    </td>
                </tr>
                <tr>
                    <td>
                        TRACE模块：
                    </td>
                    <td>
                        <input type="text" name="module" id="module"   value="public/ge/gaea">
                    </td>
                </tr>
                <tr>
                    <td>
                        邮件组：
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>收件人：</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="mailto"></td>
                            </tr>
                            <tr>
                                <td>抄送：</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="mailgroup"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td align="right">
                        <input class="ge_button" type="submit" class="submit" value="提交">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>