<?php
require_once('modules/Users/controller.php');
class CustomUsersController extends UsersController
{
    public function action_LoginWizard()
    {
        // Redirect to home or another module instead of the wizard
        header('Location: index.php?module=Home&action=index');
        exit;
    }
}