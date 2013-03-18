<?php /* Smarty version Smarty-3.1.12, created on 2013-03-15 13:24:10
         compiled from "E:\test_dir\fis_report\psge\view\page\report\widget\gContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2066551431283e60404-79737994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7c0dbdf275b519aa271b59cf10afd7505d0ae11' => 
    array (
      0 => 'E:\\test_dir\\fis_report\\psge\\view\\page\\report\\widget\\gContent.tpl',
      1 => 1363350248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2066551431283e60404-79737994',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51431283e98b30_90260535',
  'variables' => 
  array (
    'datas' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51431283e98b30_90260535')) {function content_51431283e98b30_90260535($_smarty_tpl) {?><div class="content">
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