<?php /* Smarty version Smarty-3.1.12, created on 2013-03-25 09:18:53
         compiled from "E:\test_dir\ge\psge\view\page\report\widget\lContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121745150086d7397c4-77501209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b2d38e0fb0aa5154b0dedbb3f02167c7600b7cb' => 
    array (
      0 => 'E:\\test_dir\\ge\\psge\\view\\page\\report\\widget\\lContent.tpl',
      1 => 1364193220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121745150086d7397c4-77501209',
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
  'unifunc' => 'content_5150086d74f7b6_07284422',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5150086d74f7b6_07284422')) {function content_5150086d74f7b6_07284422($_smarty_tpl) {?><div class="data_content">
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