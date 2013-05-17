<?php /* Smarty version Smarty-3.1.12, created on 2013-05-08 18:40:03
         compiled from "E:\test_dir\ge\psge\view\page\report_simple\widget\lContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1054251834a7c318db7-88933984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26f8dcc457ec73102fb5299bd19e0a6ead4c817d' => 
    array (
      0 => 'E:\\test_dir\\ge\\psge\\view\\page\\report_simple\\widget\\lContent.tpl',
      1 => 1367678081,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1054251834a7c318db7-88933984',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51834a7c349304_04207270',
  'variables' => 
  array (
    'datas' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51834a7c349304_04207270')) {function content_51834a7c349304_04207270($_smarty_tpl) {?><div class="data_content">
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