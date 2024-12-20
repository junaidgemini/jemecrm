<?php
/* Smarty version 4.5.3, created on 2024-12-20 06:47:09
  from '/var/www/webroot/local.jemecrm.com/include/utils/recaptcha_disabled.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_676512ed15de40_79312055',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dcb2ef7f2416c7d2c85e2e92626fdc276458aaa7' => 
    array (
      0 => '/var/www/webroot/local.jemecrm.com/include/utils/recaptcha_disabled.tpl',
      1 => 1730362011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_676512ed15de40_79312055 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>

  /**
   * Login Screen Validation
   */
  function validateAndSubmit() {
      generatepwd();
    }

  /**
   * Password reset screen validation
   */
  function validateCaptchaAndSubmit() {
      document.getElementById('username_password').value = document.getElementById('new_password').value;
      document.getElementById('ChangePasswordForm').submit();
    }
<?php echo '</script'; ?>
>
<?php }
}
