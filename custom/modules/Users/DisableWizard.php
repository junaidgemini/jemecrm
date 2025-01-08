<?php
class DisableWizard
{
    public function skipWizard($bean, $event, $arguments)
    {
        // Prevent the wizard from displaying
        $_SESSION['login_wizard'] = false;
    }
}
