<?php
$module_name = 'jd_retail_report';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ZONE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ZONE',
    'width' => '10%',
    'default' => true,
  ),
  'STATE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STATE',
    'width' => '10%',
    'default' => true,
  ),
  'BRANCH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BRANCH',
    'width' => '10%',
    'default' => true,
  ),
  'NEW_CLIENT' => 
  array (
    'type' => 'integer',
    'label' => 'LBL_NEW_CLIENT',
    'width' => '10%',
    'default' => true,
  ),
  'TRANSPORT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TRANSPORT',
    'width' => '10%',
    'default' => true,
  ),
  'TARGET' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_TARGET',
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
  'SITTING_BALANCE' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_SITTING_BALANCE',
    'width' => '10%',
    'default' => false,
  ),
  'ACTUAL_C' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ACTUAL_C',
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
  'DEPARTMENT_MOBILIZED' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DEPARTMENT_MOBILIZED',
    'width' => '10%',
    'default' => false,
  ),
  'VARIANCE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_VARIANCE',
    'width' => '10%',
    'default' => false,
  ),
);
;
?>
