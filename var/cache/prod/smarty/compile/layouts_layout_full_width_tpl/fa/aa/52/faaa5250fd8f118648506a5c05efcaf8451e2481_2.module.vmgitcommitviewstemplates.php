<?php
/* Smarty version 3.1.33, created on 2020-11-30 11:13:51
  from 'module:vmgitcommitviewstemplates' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc4c5dfaf5134_36162845',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'faaa5250fd8f118648506a5c05efcaf8451e2481' => 
    array (
      0 => 'module:vmgitcommitviewstemplates',
      1 => 1606486393,
      2 => 'module',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc4c5dfaf5134_36162845 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
  
 
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3793505595fc4c5dfabfed5_31505600', "page_content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'page.tpl');
}
/* {block "page_content"} */
class Block_3793505595fc4c5dfabfed5_31505600 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content' => 
  array (
    0 => 'Block_3793505595fc4c5dfabfed5_31505600',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    <ul>
        <?php if (!empty('gitCommits') && $_smarty_tpl->tpl_vars['gitCommits']->value > 2) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gitCommits']->value, 'gitCommit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['gitCommit']->value) {
?>
                <li>
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gitCommit']->value->commit->author->name, ENT_QUOTES, 'UTF-8');?>
                 </li>
                <li>
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gitCommit']->value->commit->author->date, ENT_QUOTES, 'UTF-8');?>

                </li>
                <li>
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gitCommit']->value->commit->message, ENT_QUOTES, 'UTF-8');?>

                </li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php } else { ?>
            <span>donnée manquante pour affichage</span>
            <?php echo htmlspecialchars(var_dump($_smarty_tpl->tpl_vars['gitCommits']->value), ENT_QUOTES, 'UTF-8');?>
        
        <?php }?>
    </ul>
<?php
}
}
/* {/block "page_content"} */
}
