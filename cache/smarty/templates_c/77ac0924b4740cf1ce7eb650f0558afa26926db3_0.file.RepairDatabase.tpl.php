<?php
/* Smarty version 4.5.3, created on 2024-12-27 23:58:53
  from '/var/www/webroot/local.jemecrm.com/modules/Administration/templates/RepairDatabase.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_676f3f3de284f2_53117396',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '77ac0924b4740cf1ce7eb650f0558afa26926db3' => 
    array (
      0 => '/var/www/webroot/local.jemecrm.com/modules/Administration/templates/RepairDatabase.tpl',
      1 => 1730362011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_676f3f3de284f2_53117396 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3 class="error" style="width:100%"><?php echo $_smarty_tpl->tpl_vars['MOD']->value['LBL_REPAIR_DATABASE_DIFFERENCES'];?>
</h3>
<p><?php echo $_smarty_tpl->tpl_vars['MOD']->value['LBL_REPAIR_DATABASE_TEXT'];?>
</p>
<form name="RepairDatabaseForm" method="post">
<input type="hidden" name="module" value="Administration"/>
<input type="hidden" name="action" value="repairDatabase"/>
<input type="hidden" name="raction" value="execute"/>
<textarea name="sql" rows="14" cols="150" id="repairsql"><?php echo $_smarty_tpl->tpl_vars['qry_str']->value;?>
</textarea>
<br/>
<input type="button" class="button" value="<?php echo $_smarty_tpl->tpl_vars['MOD']->value['LBL_REPAIR_DATABASE_EXECUTE'];?>
" onClick="document.RepairDatabaseForm.submit();"/> 
<input type="button" class="button" value="<?php echo $_smarty_tpl->tpl_vars['MOD']->value['LBL_REPAIR_DATABASE_EXPORT'];?>
" onClick="document.RepairDatabaseForm.raction.value='export'; document.RepairDatabaseForm.submit();"/>
<?php echo '<script'; ?>
>document.getElementById('repairsql').scrollIntoView(false);<?php echo '</script'; ?>
>
<?php }
}
