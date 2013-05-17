<?php /* Smarty version Smarty-3.1.12, created on 2013-05-09 04:53:35
         compiled from "E:\test_dir\ge\psge\view\page\report_simple\full.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20989518a889a5f2ee6-07901539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73aff48810c59cee59198b2b0e9ce3e1dc3a9cfa' => 
    array (
      0 => 'E:\\test_dir\\ge\\psge\\view\\page\\report_simple\\full.tpl',
      1 => 1368067638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20989518a889a5f2ee6-07901539',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_518a889aa569a8_79929455',
  'variables' => 
  array (
    'module' => 0,
    'fun' => 0,
    'key' => 0,
    'describe' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518a889aa569a8_79929455')) {function content_518a889aa569a8_79929455($_smarty_tpl) {?><!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?php echo $_smarty_tpl->tpl_vars['module']->value['name'];?>
测试报告</title>
    <link type="text/css" rel='stylesheet' href="../psge/static/page/report/report_simple.css"/>
    <script type="text/javascript" src="../psge/static/lib/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="../psge/static/lib/graphic/graphic.js"></script>
    <script type="text/javascript" src="../psge/static/page/report/report_simple.js"></script>
</head>
<body>

<div class="module">
    <div class="maintitle">
        <h1><?php echo $_smarty_tpl->tpl_vars['module']->value['name'];?>
测试报告</h1>
    </div>

<?php if ($_smarty_tpl->tpl_vars['module']->value['funs']){?>
    <div class="content">
        <div class="title">
            <h3>升级的功能点</h3>
        </div>


        <table width="100%" align="center" cellpadding="10" cellspacing="5"  bgcolor ="#454545" border="1"  style="border-collapse:collapse;" >
            <tr align="center" bgcolor="#19688c">
                <td width="30%">升级的功能点</td>
                <td width="70%">详细说明</td>
            </tr>
        <?php  $_smarty_tpl->tpl_vars['fun'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fun']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['module']->value['funs']['funs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fun']->key => $_smarty_tpl->tpl_vars['fun']->value){
$_smarty_tpl->tpl_vars['fun']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['fun']->key;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['fun']->value;?>
</td>
                <td>
                <?php  $_smarty_tpl->tpl_vars['describe'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['describe']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['module']->value['funs']['describes'][$_smarty_tpl->tpl_vars['key']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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

    </div>
<?php }else{ ?>
    <h1>升级的功能点为空</h1>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['module']->value['isTestData']){?>
    <div class="testdata">
        <div class="title">
            <h3>测试数据</h3>
        </div>
        <div class="datacontent">


        <?php if ($_smarty_tpl->tpl_vars['module']->value['autoTest']){?>
            <div class="data_title">
                <h4>自动化测试（单测）</h4>
            </div>
            <div class="data_class">
                <h5>1.内容</h5>
            <?php echo $_smarty_tpl->getSubTemplate ("./widget/lContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['autoTest']['content']), 0);?>

                <h5>2.覆盖率</h5>
                <div id="coverage" style="margin-left:auto;margin-right:auto;width:700px;margin-bottom: 50px;">
                    <script type='text/javascript'>
                        <?php if ($_smarty_tpl->tpl_vars['module']->value['bugStatistic']){?>
                        Ge.CreateChart(<?php echo $_smarty_tpl->tpl_vars['module']->value['autoTest']['covs'];?>
,<?php echo $_smarty_tpl->tpl_vars['module']->value['autoTest']['versions'];?>
,"coverage","单测覆盖率","coverage %");
                        <?php }?>
                    </script>
                </div>
                <h5>3.结论</h5>
            <?php echo $_smarty_tpl->getSubTemplate ("./widget/lContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['autoTest']['result']), 0);?>

            </div>
        <?php }?>


        <?php if ($_smarty_tpl->tpl_vars['module']->value['manualTest']){?>
            <div class="data_title">
                <h4>手工测试</h4>
            </div>
            <div class="data_class">
                <h5>1.内容</h5>
            <?php echo $_smarty_tpl->getSubTemplate ("./widget/lContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['manualTest']['content']), 0);?>

                <h5>2.结论</h5>
            <?php echo $_smarty_tpl->getSubTemplate ("./widget/lContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['manualTest']['result']), 0);?>

            </div>
        <?php }?>



        <?php if ($_smarty_tpl->tpl_vars['module']->value['bugStatistic']){?>
            <div class="data_title">
                <h4>bug统计</h4>
            </div>
            <div class="data_class">
                <h5>1.趋势图</h5>
                <div id="case_coverage" style="margin-left:auto;margin-right:auto;width:700px;margin-bottom: 50px;">
                </div>
                <div class="coverage">
                    <script type="text/javascript">
                        <?php if ($_smarty_tpl->tpl_vars['module']->value['bugStatistic']){?>
                        Ge.CreateChart(<?php echo $_smarty_tpl->tpl_vars['module']->value['bugStatistic']['bugs'];?>
,<?php echo $_smarty_tpl->tpl_vars['module']->value['bugStatistic']['versions'];?>
,"case_coverage","active bug统计","个数");
                        <?php }?>
                    </script>
                </div>
                <h5>2.结论</h5>
            <?php echo $_smarty_tpl->getSubTemplate ("./widget/lContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['bugStatistic']['result']), 0);?>

            </div>
        <?php }?>



        </div>
    </div>
<?php }?>




<?php if ($_smarty_tpl->tpl_vars['module']->value['result']){?>
<?php echo $_smarty_tpl->getSubTemplate ("./widget/gContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['result']), 0);?>

<?php }?>




<?php if ($_smarty_tpl->tpl_vars['module']->value['effi']){?>
<?php echo $_smarty_tpl->getSubTemplate ("./widget/gContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['effi']), 0);?>

<?php }?>




<?php if ($_smarty_tpl->tpl_vars['module']->value['declaration']){?>
<?php echo $_smarty_tpl->getSubTemplate ("./widget/gContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['declaration']), 0);?>

<?php }?>

</div>
</body>
</html>
<?php }} ?>