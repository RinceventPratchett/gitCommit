<?php
/* Smarty version 3.1.33, created on 2020-11-18 18:12:39
  from 'F:\www\wamp64\www\gitcommit\admin7719fntrc\themes\new-theme\template\components\layout\confirmation_messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fb55607c89a71_80081122',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd80c5e1392cf5991a607491f73411b8d4403187' => 
    array (
      0 => 'F:\\www\\wamp64\\www\\gitcommit\\admin7719fntrc\\themes\\new-theme\\template\\components\\layout\\confirmation_messages.tpl',
      1 => 1605710218,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb55607c89a71_80081122 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['confirmations']->value) && count($_smarty_tpl->tpl_vars['confirmations']->value) && $_smarty_tpl->tpl_vars['confirmations']->value) {?>
  <div class="bootstrap">
    <div class="alert alert-success" style="display:block;">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['confirmations']->value, 'conf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['conf']->value) {
?>
        <?php echo $_smarty_tpl->tpl_vars['conf']->value;?>

      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
  </div>
<?php }
}
}
