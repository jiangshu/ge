<?php /* Smarty version Smarty-3.1.12, created on 2013-03-15 13:29:31
         compiled from "E:\test_dir\fis_report\psge\view\page\report\widget\lContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:318455143142b3bc469-72895551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1635998febf3462249e0ccd90a575cfa0e729ea' => 
    array (
      0 => 'E:\\test_dir\\fis_report\\psge\\view\\page\\report\\widget\\lContent.tpl',
      1 => 1363350546,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '318455143142b3bc469-72895551',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datas' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5143142b3d73c9_85454326',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5143142b3d73c9_85454326')) {function content_5143142b3d73c9_85454326($_smarty_tpl) {?><div class="data_content">
    <ul>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
        <li><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</li>
    <?php } ?>
    </ul>
</div><?php }} ?>