<?php
/* Smarty version 4.5.3, created on 2024-12-27 23:59:16
  from '/var/www/webroot/local.jemecrm.com/modules/ModuleBuilder/tpls/assistantJavascript.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_676f3f54c7bc93_31171510',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '71f61b72446e1f5dd4dcf131ecd091985d25cd07' => 
    array (
      0 => '/var/www/webroot/local.jemecrm.com/modules/ModuleBuilder/tpls/assistantJavascript.tpl',
      1 => 1730362011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_676f3f54c7bc93_31171510 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>

if(typeof(Assistant)!="undefined" && Assistant.mbAssistant){
	//Assistant.mbAssistant.render(document.body);

<?php if ($_smarty_tpl->tpl_vars['userPref']->value) {?>
	Assistant.processUserPref("<?php echo $_smarty_tpl->tpl_vars['userPref']->value;?>
");
<?php }
if ($_smarty_tpl->tpl_vars['assistant']->value['key'] && $_smarty_tpl->tpl_vars['assistant']->value['group']) {?>
	Assistant.mbAssistant.setBody(SUGAR.language.get('ModuleBuilder','assistantHelp').<?php echo $_smarty_tpl->tpl_vars['assistant']->value['group'];?>
.<?php echo $_smarty_tpl->tpl_vars['assistant']->value['key'];?>
);
<?php }?>

	if(Assistant.mbAssistant.visible){
		Assistant.mbAssistant.show();
		}
}

<?php echo '</script'; ?>
><?php }
}
