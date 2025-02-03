<?php
$module_name = 'jd_agent_banking_report';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
      'agents_onboarded' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_AGENTS_ONBOARDED',
        'width' => '10%',
        'default' => true,
        'name' => 'agents_onboarded',
      ),
      'report_type' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_REPORT_TYPE',
        'width' => '10%',
        'default' => true,
        'name' => 'report_type',
      ),
      'target' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_TARGET',
        'width' => '10%',
        'default' => true,
        'name' => 'target',
      ),
      'actual' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_ACTUAL',
        'width' => '10%',
        'default' => true,
        'name' => 'actual',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
;
?>
