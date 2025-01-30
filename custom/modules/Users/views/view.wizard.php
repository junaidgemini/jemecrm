<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
require_once('modules/Users/Forms.php');
require_once('modules/Configurator/Configurator.php');

class CustomViewWizard extends SugarView
{
    /**
     * Constructor.
     */
    public function display()
    {
        header("Location: index.php?module=Home&action=index");
        exit();
        // parent::__construct($bean, $view_object_map);

        // $this->options['show_header'] = false;
        // $this->options['show_footer'] = false;
        // $this->options['show_javascript'] = false;
    }
}
