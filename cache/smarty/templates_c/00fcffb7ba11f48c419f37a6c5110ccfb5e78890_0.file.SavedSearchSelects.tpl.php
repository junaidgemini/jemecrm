<?php
/* Smarty version 4.5.3, created on 2024-12-20 06:47:28
  from '/var/www/webroot/local.jemecrm.com/modules/SavedSearch/SavedSearchSelects.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_676513003d5ab3_96156829',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00fcffb7ba11f48c419f37a6c5110ccfb5e78890' => 
    array (
      0 => '/var/www/webroot/local.jemecrm.com/modules/SavedSearch/SavedSearchSelects.tpl',
      1 => 1730362011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_676513003d5ab3_96156829 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['SAVED_SEARCHES_OPTIONS']->value != null) {?>
<select style="width: auto !important; min-width: 150px;" name='saved_search_select' id='saved_search_select' onChange='SUGAR.savedViews.shortcut_select(this, "<?php echo $_smarty_tpl->tpl_vars['SEARCH_MODULE']->value;?>
");'>
	<?php echo $_smarty_tpl->tpl_vars['SAVED_SEARCHES_OPTIONS']->value;?>

</select>
<?php echo '<script'; ?>
>

	//if the function exists, call the function that will populate the searchform
	//labels based on the value of the saved search dropdown
	if(typeof(fillInLabels)=='function'){
		fillInLabels();
	}
	
<?php echo '</script'; ?>
>
<?php }?>

<?php }
}
