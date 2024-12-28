<?php
$module_name = 'jd_agent_banking_report';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'report_type',
            'label' => 'LBL_REPORT_TYPE',
          ),
          1 => 
          array (
            'name' => 'agents_onboarded',
            'label' => 'LBL_AGENTS_ONBOARDED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'actual',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_ACTUAL',
          ),
          1 => 
          array (
            'name' => 'target',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_TARGET',
          ),
        ),
        3 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
;
?>
