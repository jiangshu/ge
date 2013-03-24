<?php /* Smarty version Smarty-3.1.12, created on 2013-03-18 15:52:13
         compiled from "E:\test_dir\fis_report\psge\view\page\report\simple.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3075551472a1d000e91-28251182%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd13e678da0891698e0f4291da4bfa9eea4cd9854' => 
    array (
      0 => 'E:\\test_dir\\fis_report\\psge\\view\\page\\report\\simple.tpl',
      1 => 1363330236,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3075551472a1d000e91-28251182',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'report_full_url' => 0,
    'datas' => 0,
    'item' => 0,
    'product_name' => 0,
    'data' => 0,
    'version' => 0,
    'tmp' => 0,
    'cov' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51472a1d579100_39561920',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51472a1d579100_39561920')) {function content_51472a1d579100_39561920($_smarty_tpl) {?><!doctype html>
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
            border: rgb(233, 233, 233) 1px dotted;
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
<?php if ($_smarty_tpl->tpl_vars['module']->value['data']['content']['funs']){?>
<?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['data']['content']['funs'], null, 0);?>
    <tr>
        <td width="200"><h3>升级的功能点</h3></td>
        <td >
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

    <tr>
        <td width="200"><h3>测试数据</h3></td>
        <td>
            <table  width="100%" align="center" cellpadding="10" cellspacing="5"  style="border-collapse:collapse;"  >
            <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['bugs']){?>
            <?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['bugs'], null, 0);?>
                <tr>
                    <td><div class="sDot"></div><h4>bug数和分布</h4></td>
                </tr>
                <tr>
                    <td>
                         <table  width="700" align="center" cellpadding="3" cellspacing="1" border="1" style="border-collapse:collapse;">
                             <tr bgcolor="#19688c" align="center" style="color:#ffc339">
                                 <td width="50%">功能</td>
                                 <td width="15%">bug总数</td>
                                 <td width="15%">active bug</td>
                                 <td width="20%">负责人</td>
                             </tr>
                         <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                             <tr>
                                 <td><?php echo $_smarty_tpl->tpl_vars['item']->value['fun'];?>
</td>
                                 <td style="color:#009933"><?php echo $_smarty_tpl->tpl_vars['item']->value['count'];?>
</td>
                             <?php if ($_smarty_tpl->tpl_vars['item']->value['active']>0){?>
                                 <td style="color:#FF0000"><?php echo $_smarty_tpl->tpl_vars['item']->value['active'];?>
</td>
                             <?php }else{ ?>
                                 <td><?php echo $_smarty_tpl->tpl_vars['item']->value['active'];?>
</td>
                             <?php }?>

                                 <td>
                                     <div><?php echo $_smarty_tpl->tpl_vars['item']->value['qa'];?>
</div>
                                     <div style="color:#FF0000"><?php echo $_smarty_tpl->tpl_vars['item']->value['rd'];?>
</div>
                                 </td>
                             </tr>
                         <?php } ?>
                         </table>
                    </td>
                </tr>
            <?php }?>


            <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['diffs']){?>
            <?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['diffs'], null, 0);?>
                <tr>
                    <td> <span class="sDot"></span><h4>diff结果</h4></td>
                </tr>
                <tr>
                    <td>

                    <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['product_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['datas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['product_name']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
                        <div style="color:#2a89ea;margin-left:20px;font-weight:bold;font-size:18px;">^<?php echo $_smarty_tpl->tpl_vars['product_name']->value;?>
产品线</div>
                        <div style="color:#72c529;margin-left:20px;font-weight:bold;font-size:16px;margin-top:20px;margin-bottom:10px">@ 新发布版本与上一版本编译时间对比:</div>
                        <div class="diff_table">
                            <table width="700" align="center" border="1" cellpadding="2" cellspacing="1" style="border-collapse:collapse;">
                                <thead>
                                <tr bgcolor="#19688c" align="center" style="color:#ffc339">
                                    <td>模块名</td>
                                    <td>新版本的编译时间</td>
                                    <td>老版本的编译时间</td>
                                    <td>差值</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                <tr align="center">
                                    <td> <?php echo $_smarty_tpl->tpl_vars['item']->value['module'];?>
</td>
                                    <td> <?php echo $_smarty_tpl->tpl_vars['item']->value['new'];?>
</td>
                                    <td> <?php echo $_smarty_tpl->tpl_vars['item']->value['old'];?>
</td>
                                <?php if ($_smarty_tpl->tpl_vars['item']->value['change']>0){?>
                                    <td style="color:#FF0000">上升<?php echo $_smarty_tpl->tpl_vars['item']->value['change'];?>
%</td>
                                <?php }else{ ?>
                                    <td style="color:#009933">下降<?php echo 0-$_smarty_tpl->tpl_vars['item']->value['change'];?>
%</td>
                                <?php }?>

                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    <?php } ?>

                        <div style="color:#72c529;margin-left:20px;font-weight:bold;font-size:16px;margin-top:20px;margin-bottom:10px">@ diff结论</div>
                        <div class="data_content">
                            <ul>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['diffResult']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                <li><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</li>
                            <?php } ?>
                            </ul>
                        </div>

                    </td>
                </tr>
             <?php }?>


            <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['cov']){?>
            <?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['cov'], null, 0);?>
                <tr  >
                    <td><span class="sDot"></span><h4>覆盖率</h4></td>
                </tr>
                <tr>
                    <td>
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

                        <div style="color:#72c529;margin-left:20px;font-weight:bold;font-size:16px;margin-top:20px;margin-bottom:10px">@ coverage结论</div>
                        <div class="data_content">
                            <ul>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['covResult']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                <li><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</li>
                            <?php } ?>
                            </ul>
                        </div>

                    </td>
                </tr>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['isCaseStatistic']){?>
                <tr  >
                    <td><span class="sDot"></span><h4>本版本自动化case添加个数</h4></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['caseStatistic']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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

            <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['isStartScript']){?>
                <tr >
                    <td><span class="sDot"></span><h4>Start.sh脚本</h4></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['startScript']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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

            <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['is_CI_Sample']){?>
                <tr >
                    <td><span class="sDot"></span><h4>CI、sample自动化是否全部通过</h4></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['CI_Sample']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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


            <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['isCompile']){?>
                <tr >
                    <td><span class="sDot"></span><h4>是否在编译机上运行（用于保证产品线使用编辑机环境正常</h4></td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['compile']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
        </td>
    </tr>

<?php if ($_smarty_tpl->tpl_vars['module']->value['data']['content']['result']){?>
<?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['data']['content']['result'], null, 0);?>
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


<?php if ($_smarty_tpl->tpl_vars['module']->value['data']['content']['effi']){?>
<?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['data']['content']['effi'], null, 0);?>
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


<?php if ($_smarty_tpl->tpl_vars['module']->value['data']['content']['exp']){?>
<?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['data']['content']['exp'], null, 0);?>
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