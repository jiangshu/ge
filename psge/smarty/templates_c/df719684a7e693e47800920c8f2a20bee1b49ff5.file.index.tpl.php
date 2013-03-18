<?php /* Smarty version Smarty-3.1.12, created on 2013-03-15 13:33:20
         compiled from "E:\test_dir\fis_report\psge\view\page\report\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206625143118656b843-11967839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df719684a7e693e47800920c8f2a20bee1b49ff5' => 
    array (
      0 => 'E:\\test_dir\\fis_report\\psge\\view\\page\\report\\index.tpl',
      1 => 1363350794,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206625143118656b843-11967839',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51431186bc4bf6_21497533',
  'variables' => 
  array (
    'module' => 0,
    'datas' => 0,
    'item' => 0,
    'product_name' => 0,
    'data' => 0,
    'report_simple_file' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51431186bc4bf6_21497533')) {function content_51431186bc4bf6_21497533($_smarty_tpl) {?><!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?php echo $_smarty_tpl->tpl_vars['module']->value['name'];?>
测试报告</title>
    <link type="text/css" rel='stylesheet' href="../static/page/report/report.css"/>
    <script type="text/javascript" src="../static/lib/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="../static/lib/graphic/graphic.js"></script>
    <script type="text/javascript" src="../static/page/report/report.js"></script>
</head>
<body>



<div class="module">
    <div class="maintitle">
        <h1><?php echo $_smarty_tpl->tpl_vars['module']->value['name'];?>
测试报告</h1>
    </div>
    <div class="send_mail">
        <div class="send_mail_button">发送邮件</div>
    </div>


    <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['content']['funs']){?>
        <?php echo $_smarty_tpl->getSubTemplate ("./widget/gContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['data']['content']['funs']), 0);?>

    <?php }?>




<?php if ($_smarty_tpl->tpl_vars['module']->value['data']['testdata']){?>
    <div class="testdata">
        <div class="title">
            <h3>测试数据</h3>
        </div>

        <div class="datacontent">


        
        <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['bugs']){?>
            <?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['bugs'], null, 0);?>
            <div class="data_title">
                <h4>bug数和分布</h4>
            </div>
            <div class="bugtable">
                <table align="center" cellpadding="5" cellspacing="1" border="1" >
                    <tr bgcolor="#19688c" align="center" style="font-weight: bold;">
                        <td width="60%">功能</td>
                        <td width="10%">bug总数</td>
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
            </div>
        <?php }?>
        



        
        <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['diffs']){?>
            <?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['diffs'], null, 0);?>
            <div class="data_title">
                <h4>diff结果</h4>
            </div>

            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['product_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['datas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['product_name']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
                <h4 style="margin-left:20px;color:#fff01c;"><?php echo $_smarty_tpl->tpl_vars['product_name']->value;?>
产品线</h4>
                <div style="color:#ffc339;margin-left:20px;font-size:18px">1.新发布版本与上一版本编译时间对比:</div>
                <div class="diff_table">
                    <table width="800" border="1" cellpadding="5" cellspacing="1">
                        <thead>
                        <tr bgcolor="#19688c" align="center">
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

                <div style="color:#ffc339;margin-left:20px;font-size:18px;margin-top:20px;">2.dev分支编译时间曲线图:</div>
                <div class="diff_chart">
                    <img src="http://10.48.30.87:8088/<?php echo $_smarty_tpl->tpl_vars['module']->value['project'];?>
_dev_diff_slow/test/util/diff/test_compiletime.php?product=<?php echo $_smarty_tpl->tpl_vars['product_name']->value;?>
">
                </div>
            <?php } ?>

            <div style="color:#72c529;margin-left:20px;font-weight:bold;font-size:20px;margin-top:20px;margin-bottom:10px">@@ diff结论</div>
            <?php echo $_smarty_tpl->getSubTemplate ("./widget/lContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['diffResult']), 0);?>


        <?php }?>
        



        
            <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['cov']){?>
                <?php $_smarty_tpl->tpl_vars['datas'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['cov'], null, 0);?>
                <div class="data_title">
                    <h3>覆盖率</h3>
                </div>
               <div id="case_coverage" style="margin-left:auto;margin-right:auto;width:700px;margin-bottom: 50px;">
               </div>
                <div class="coverage">
                    <script type="text/javascript">
                        <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['cov']){?>
                        Ge.CreateChart(<?php echo $_smarty_tpl->tpl_vars['datas']->value['covs'];?>
,<?php echo $_smarty_tpl->tpl_vars['datas']->value['versions'];?>
);
                        <?php }?>
                    </script>
                </div>

               <div style="color:#72c529;margin-left:20px;font-weight:bold;font-size:20px;margin-top:20px;margin-bottom:10px">@@ coverage结论</div>
               <?php echo $_smarty_tpl->getSubTemplate ("./widget/lContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['covResult']), 0);?>

            <?php }?>
        



        
        <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['isCaseStatistic']){?>
            <div class="data_title">
                <h3>本版本自动化case添加个数</h3>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("./widget/lContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['caseStatistic']), 0);?>

        <?php }?>


        <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['isStartScript']){?>
            <div class="data_title">
                <h3>Start.sh脚本</h3>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("./widget/lContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['startScript']), 0);?>

        <?php }?>


        <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['is_CI_Sample']){?>
            <div class="data_title">
                <h3>CI、sample自动化是否全部通过</h3>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("./widget/lContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['CI_Sample']), 0);?>

        <?php }?>


        <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['isCompile']){?>
            <div class="data_title">
                <h3>是否在编译机上运行（用于保证产品线使用编辑机环境正常</h3>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("./widget/lContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['data']['testdata']['else']['compile']), 0);?>

        <?php }?>
        

        </div>
    </div>
<?php }?>




    
    <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['content']['result']){?>
         <?php echo $_smarty_tpl->getSubTemplate ("./widget/gContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['data']['content']['result']), 0);?>

    <?php }?>
    


    
    <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['content']['effi']){?>
         <?php echo $_smarty_tpl->getSubTemplate ("./widget/gContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['data']['content']['effi']), 0);?>

    <?php }?>
    


    
    <?php if ($_smarty_tpl->tpl_vars['module']->value['data']['content']['exp']){?>
         <?php echo $_smarty_tpl->getSubTemplate ("./widget/gContent.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('datas'=>$_smarty_tpl->tpl_vars['module']->value['data']['content']['exp']), 0);?>

    <?php }?>
    

    <div class="send_mail">
        <div class="send_mail_button">发送邮件</div>
    </div>

</div>

<div class="tip">邮件发送成功</div>

<script type="text/javascript">
    var width = $("body").width();
    $(".tip").css("left",width/2);

    $(".send_mail_button").click(function(){
        $.get("./ReportSendMail.php",{
            file:"<?php echo $_smarty_tpl->tpl_vars['report_simple_file']->value;?>
",
            project:"<?php echo $_smarty_tpl->tpl_vars['module']->value['project'];?>
",
            version:"<?php echo $_smarty_tpl->tpl_vars['module']->value['version'];?>
"
        },function(data, status){
              if(data){
                  $(".tip").html("邮件发送成功").slideDown(1000);
                  setTimeout(function(){
                      $(".tip").slideUp(500);
                  },1100)
              }else{
                  $(".tip").slideDown(1000);
                  setTimeout(function(){
                      $(".tip").html("邮件发送失败").slideUp(500);
                  },2000)
              }
        });
    })
</script>

</body>
</html>
<?php }} ?>