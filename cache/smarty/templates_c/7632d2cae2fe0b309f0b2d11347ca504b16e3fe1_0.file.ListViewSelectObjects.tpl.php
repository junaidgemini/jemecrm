<?php
/* Smarty version 4.5.3, created on 2024-12-20 06:47:13
  from '/var/www/webroot/local.jemecrm.com/themes/SuiteP/include/ListView/ListViewSelectObjects.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_676512f1975e27_69736550',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7632d2cae2fe0b309f0b2d11347ca504b16e3fe1' => 
    array (
      0 => '/var/www/webroot/local.jemecrm.com/themes/SuiteP/include/ListView/ListViewSelectObjects.tpl',
      1 => 1730362011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_676512f1975e27_69736550 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="selectedRecords label hidden"><?php echo $_smarty_tpl->tpl_vars['APP']->value['LBL_LISTVIEW_SELECTED_OBJECTS'];?>
</div><div class="selectedRecords value hidden"><?php echo $_smarty_tpl->tpl_vars['TOTAL_ITEMS_SELECTED']->value;?>
</div>
<input type='hidden' id='selectCountTop' name='selectCount[]' value='<?php echo $_smarty_tpl->tpl_vars['TOTAL_ITEMS_SELECTED']->value;?>
' />

<?php echo '<script'; ?>
>

    $(document).ready(function () {
        setInterval(function () {
            sListView.toggleSelected();
        }, 100);
    });

<?php echo '</script'; ?>
><?php }
}
