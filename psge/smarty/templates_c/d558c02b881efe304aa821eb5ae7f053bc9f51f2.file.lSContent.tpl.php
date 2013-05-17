<?php /* Smarty version Smarty-3.1.12, created on 2013-05-05 19:07:44
         compiled from "E:\test_dir\ge\psge\view\page\report_simple\widget\lSContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:307451851cb9cd1da6-07934108%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd558c02b881efe304aa821eb5ae7f053bc9f51f2' => 
    array (
      0 => 'E:\\test_dir\\ge\\psge\\view\\page\\report_simple\\widget\\lSContent.tpl',
      1 => 1367773659,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '307451851cb9cd1da6-07934108',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51851cb9ce1910_95879933',
  'variables' => 
  array (
    'datas' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51851cb9ce1910_95879933')) {function content_51851cb9ce1910_95879933($_smarty_tpl) {?><div style="margin-left:30px;">
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
</div>

<?php }} ?>