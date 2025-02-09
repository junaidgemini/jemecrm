<?php
$module_name = 'jd_agent_banking_report';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'TARGET' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_TARGET',
    'width' => '10%',
    'default' => true,
  ),
  'ACTUAL' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_ACTUAL',
    'width' => '10%',
    'default' => true,
  ),
  'REPORT_TYPE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_REPORT_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'AGENTS_ONBOARDED' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_AGENTS_ONBOARDED',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => false,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => false,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => false,
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_MODIFIED_NAME',
    'id' => 'MODIFIED_USER_ID',
    'width' => '10%',
    'default' => false,
  ),
);
;
?>
