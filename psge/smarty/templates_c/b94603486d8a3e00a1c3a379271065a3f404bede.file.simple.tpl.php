<?php /* Smarty version Smarty-3.1.12, created on 2013-05-05 19:07:11
         compiled from "E:\test_dir\ge\psge\view\page\report_simple\simple.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108105183ac9e800784-59048117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b94603486d8a3e00a1c3a379271065a3f404bede' => 
    array (
      0 => 'E:\\test_dir\\ge\\psge\\view\\page\\report_simple\\simple.tpl',
      1 => 1367773627,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108105183ac9e800784-59048117',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5183ac9f173944_53869943',
  'variables' => 
  array (
    'module' => 0,
    'report_full_url' => 0,
    'datas' => 0,
    'fun' => 0,
    'key' => 0,
    'describe' => 0,
    'version' => 0,
    'tmp' => 0,
    'cov' => 0,
    'bug' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5183ac9f173944_53869943')) {function content_5183ac9f173944_53869943($_smarty_tpl) {?><!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <style type="text/css">
        table{
            border-collapse:collapse;
            border: rgb(48, 214, 52) 2px dotted;
            font-family: "\5FAE\8F6F\96C5\9ED1", Helvetica;
        }

        table tr table{
            border: rgb(129, 129, 129) 1px dotted;
        }

        table tr table tr table{
            border: rgb(49, 73, 132) 1px dotted;
        }

        .bDot{
            width:15px;
            height:15px;
            display: inline-block;
            background: red;
            margin-left:5px;

        }

        .sDot{
            width:15px;
            height:15px;
            display: inline-block;
            background: #df132f;
            margin-right:5px;
        }

        h4{
            display: inline-block;
            color: #1558aa;
        }

        .subtitle{
            margin-left:30px;
            color:#c48c0a;
            font-size:18px
        }


    </style>
</head>
<body>
<h1 id="aaa" style="text-align: center;color:#0e0ff6;"><?php echo $_smarty_tpl->tpl_vars['module']->value['name'];?>
测试报告</h1>
<div style="text-align: center;color:#ff1813;font-size:20px;font-weight:bold;margin-bottom:20px;">
    <a href="<?php echo $_smarty_tpl->tpl_vars['report_full_url']->value;?>
" style="text-decoration: none;padding:5px;color:#ff1813;">点击获取详细信息</a>
</div>

<table align="center" cellpadding="10" cellspacing="1" border="1" width="1000" >
<?php if ($_smarty_tpl->tpl_vars['module']->value['funs']){?>
    <?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['funs'], null, 0);?>
    <tr>
        <td width="200"><h3>升级的功能点</h3></td>
        <td >
            <table width="100%" align="center" cellpadding="10" cellspacing="5"   border="1"  style="border-collapse:collapse;" >
                <tr align="center" bgcolor="#19688c" style="color:#ffc339">
                    <td width="30%">升级的功能点</td>
                    <td width="70%">详细说明</td>
                </tr>
                <?php  $_smarty_tpl->tpl_vars['fun'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fun']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['datas']->value['funs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fun']->key => $_smarty_tpl->tpl_vars['fun']->value){
$_smarty_tpl->tpl_vars['fun']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['fun']->key;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['fun']->value;?>
</td>
                        <td>
                        <?php  $_smarty_tpl->tpl_vars['describe'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['describe']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datas']->value['describes'][$_smarty_tpl->tpl_vars['key']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['describe']->key => $_smarty_tpl->tpl_vars['describe']->value){
$_smarty_tpl->tpl_vars['describe']->_loop = true;
?>
                            <li><?php echo $_smarty_tpl->tpl_vars['describe']->value;?>
</li>
                        <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </td>
    </tr>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['module']->value['isTestData']){?>
    <tr>
        <td width="200"><h3>测试数据</h3></td>
        <td>
            <table  width="100%" align="center" cellpadding="10" cellspacing="5"  style="border-collapse:collapse;"  >
            <?php if ($_smarty_tpl->tpl_vars['module']->value['manualTest']){?>
                <?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['manualTest'], null, 0);?>
                <tr>
                    <td><div class="sDot"></div><h4>手工测试</h4></td>
                </tr>
                <tr>
                    <td>
                        <div class="subtitle">
                            1.内容
                        </div>
                       <?php echo $_smarty_tpl->getSubTemplate ("./widget/lSContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['datas']->value['content']), 0);?>


                        <div class="subtitle">
                            2.结论
                        </div>
                        <?php echo $_smarty_tpl->getSubTemplate ("./widget/lSContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['datas']->value['result']), 0);?>

                    </td>
                </tr>
            <?php }?>


            <?php if ($_smarty_tpl->tpl_vars['module']->value['autoTest']){?>
            <?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['autoTest'], null, 0);?>
                <tr>
                    <td><div class="sDot"></div><h4>自动化测试</h4></td>
                </tr>
                <tr>
                    <td>
                        <div class="subtitle">
                            1.内容
                        </div>
                       <?php echo $_smarty_tpl->getSubTemplate ("./widget/lSContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['datas']->value['content']), 0);?>


                        <div class="subtitle">
                            2.覆盖率
                        </div>
                        <div style="margin-top:10px;margin-bottom:20px;">
                            <table  width="800" align="center" cellpadding="3" cellspacing="1" border="1" style="border-collapse:collapse;">
                                <tr align="center">
                                    <td bgcolor="#19688c" style="color:#ffc339">版本</td>
                                <?php  $_smarty_tpl->tpl_vars['version'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['version']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datas']->value['versions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['version']->key => $_smarty_tpl->tpl_vars['version']->value){
$_smarty_tpl->tpl_vars['version']->_loop = true;
?>
                                    <td><?php echo $_smarty_tpl->tpl_vars['version']->value;?>
</td>
                                <?php } ?>
                                </tr>
                                <tr align="center">
                                    <td bgcolor="#19688c" style="color:#ffc339">覆盖率</td>
                                <?php $_smarty_tpl->tpl_vars['tmp'] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['cov'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cov']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datas']->value['covs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cov']->key => $_smarty_tpl->tpl_vars['cov']->value){
$_smarty_tpl->tpl_vars['cov']->_loop = true;
?>
                                <?php if ($_smarty_tpl->tpl_vars['tmp']->value>$_smarty_tpl->tpl_vars['cov']->value){?>
                                    <td style="color:red"><?php echo $_smarty_tpl->tpl_vars['cov']->value;?>
%↓</td>
                                <?php }else{ ?>
                                    <td><?php echo $_smarty_tpl->tpl_vars['cov']->value;?>
%↑</td>
                                <?php }?>
                                <?php $_smarty_tpl->tpl_vars['tmp'] = new Smarty_variable($_smarty_tpl->tpl_vars['cov']->value, null, 0);?>
                                <?php } ?>
                                </tr>
                            </table>
                        </div>

                        <div class="subtitle">
                            3.结论
                        </div>
                       <?php echo $_smarty_tpl->getSubTemplate ("./widget/lSContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['datas']->value['result']), 0);?>


                    </td>
                </tr>
            <?php }?>


            <?php if ($_smarty_tpl->tpl_vars['module']->value['bugStatistic']){?>
            <?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['bugStatistic'], null, 0);?>
                <tr>
                    <td><div class="sDot"></div><h4>Active bug统计</h4></td>
                </tr>
                <tr>
                    <td>
                        <div class="subtitle">
                            1.active bug统计
                        </div>
                        <div style="margin-top:10px;margin-bottom:20px;">
                            <table  width="800" align="center" cellpadding="3" cellspacing="1" border="1" style="border-collapse:collapse;">
                                <tr align="center">
                                    <td bgcolor="#19688c" style="color:#ffc339">版本</td>
                                <?php  $_smarty_tpl->tpl_vars['version'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['version']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datas']->value['versions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['version']->key => $_smarty_tpl->tpl_vars['version']->value){
$_smarty_tpl->tpl_vars['version']->_loop = true;
?>
                                    <td><?php echo $_smarty_tpl->tpl_vars['version']->value;?>
</td>
                                <?php } ?>
                                </tr>
                                <tr align="center">
                                    <td bgcolor="#19688c" style="color:#ffc339">bug数目</td>
                                <?php $_smarty_tpl->tpl_vars['tmp'] = new Smarty_variable(0, null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['bug'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bug']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datas']->value['bugs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bug']->key => $_smarty_tpl->tpl_vars['bug']->value){
$_smarty_tpl->tpl_vars['bug']->_loop = true;
?>
                                <?php if ($_smarty_tpl->tpl_vars['tmp']->value>$_smarty_tpl->tpl_vars['bug']->value){?>
                                    <td style="color:red"><?php echo $_smarty_tpl->tpl_vars['bug']->value;?>
↓</td>
                                <?php }else{ ?>
                                    <td><?php echo $_smarty_tpl->tpl_vars['bug']->value;?>
↑</td>
                                <?php }?>
                                <?php $_smarty_tpl->tpl_vars['tmp'] = new Smarty_variable($_smarty_tpl->tpl_vars['bug']->value, null, 0);?>
                                <?php } ?>
                                </tr>
                            </table>
                        </div>

                        <div class="subtitle">
                            2.结论
                        </div>
                    <?php echo $_smarty_tpl->getSubTemplate ("./widget/lSContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['datas']->value['result']), 0);?>


                    </td>
                </tr>
            <?php }?>


            </table>
        </td>
    </tr>
<?php }?>



<?php if ($_smarty_tpl->tpl_vars['module']->value['result']){?>
<?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['result'], null, 0);?>
<tr>
    <td><h3>测试结论</h3></td>
    <td>
        <ul>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datas']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <li><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</li>
        <?php } ?>
        </ul>
    </td>
</tr>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['module']->value['effi']){?>
<?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['effi'], null, 0);?>
<tr>
    <td ><h3>效率数据</h3></td>
    <td>
        <ul>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datas']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <li><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</li>
        <?php } ?>
        </ul>
    </td>
</tr>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['module']->value['declaration']){?>
<?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['declaration'], null, 0);?>
<tr>
    <td><h3>说明</h3></td>
    <td>
        <ul style="color:red">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datas']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <li><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</li>
        <?php } ?>
        </ul>
    </td>
</tr>
<?php }?>
</table>
<div style="text-align: center;color:#ff1813;font-size:20px;font-weight:bold;margin-bottom:20px;margin-top:20px;">
    <a href="<?php echo $_smarty_tpl->tpl_vars['report_full_url']->value;?>
" style="text-decoration: none;padding:5px;color:#ff1813;">点击获取详细信息</a>
</div>
</body>
</html>
<?php }} ?>