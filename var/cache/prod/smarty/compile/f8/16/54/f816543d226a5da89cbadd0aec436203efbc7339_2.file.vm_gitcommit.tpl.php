<?php
/* Smarty version 3.1.33, created on 2020-11-18 21:27:21
  from 'F:\www\wamp64\www\gitcommit\modules\vm_gitcommit\views\templates\hook\vm_gitcommit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fb583a91cf129_77829212',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f816543d226a5da89cbadd0aec436203efbc7339' => 
    array (
      0 => 'F:\\www\\wamp64\\www\\gitcommit\\modules\\vm_gitcommit\\views\\templates\\hook\\vm_gitcommit.tpl',
      1 => 1605731236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb583a91cf129_77829212 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Block ns_monmodule -->
<div id="vm_gitcommit_block_home" class="block">
  <h4><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Module Git Commit','d'=>'Modules.Vm_GitCommit'),$_smarty_tpl ) );?>
</h4>
  <div class="block_content">
    <div><?php echo htmlspecialchars(var_dump($_smarty_tpl->tpl_vars['response']->value), ENT_QUOTES, 'UTF-8');?>
</div>
    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vm_page_link']->value, ENT_QUOTES, 'UTF-8');?>
">
           <?php if (isset($_smarty_tpl->tpl_vars['vm_page_name']->value) && $_smarty_tpl->tpl_vars['vm_page_name']->value) {?>
               <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vm_page_name']->value, ENT_QUOTES, 'UTF-8');?>

               <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
                   <div><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error']->value, ENT_QUOTES, 'UTF-8');?>
</div>
               <?php }?>
           <?php } else { ?>
               Votre lien
           <?php }?>
    </a>
  </div>
</div>
<!-- /Block ns_monmodule -->

<?php }
}
