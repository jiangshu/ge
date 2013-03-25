<?php /* Smarty version Smarty-3.1.12, created on 2013-03-25 09:18:53
         compiled from "E:\test_dir\ge\psge\view\page\report\widget\gContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:132315150086d7642c5-77666464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a81a402215b2f5733a01212f3cc5e3fe39f54d5' => 
    array (
      0 => 'E:\\test_dir\\ge\\psge\\view\\page\\report\\widget\\gContent.tpl',
      1 => 1364193220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132315150086d7642c5-77666464',
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
  'unifunc' => 'content_5150086d787875_31194742',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5150086d787875_31194742')) {function content_5150086d787875_31194742($_smarty_tpl) {?><div class="content">
    <div class="title">
        <h3><?php echo $_smarty_tpl->tpl_vars['datas']->value['title'];?>
</h3>
    </div>
    <div class="text">
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
    </div>
</div><?php }} ?>