<?php
$module_name = 'jd_consideration';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'CUSTOMER_FULL_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CUSTOMER_FULL_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'OCCUPATION' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_OCCUPATION',
    'width' => '10%',
    'default' => true,
  ),
  'EMAIL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL',
    'width' => '10%',
    'default' => true,
  ),
  'MOBILE' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_MOBILE',
    'width' => '10%',
    'default' => true,
  ),
  'GENDER' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_GENDER',
    'width' => '10%',
    'default' => true,
  ),
  'JD_ZONE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_JD_ZONE',
    'width' => '10%',
    'default' => true,
  ),
  'LOCATION' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_LOCATION',
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
  'DECISION_TO_CONSIDER_LAPO' => 
  array (
    'type' => 'multienum',
    'studio' => 'visible',
    'label' => 'LBL_DECISION_TO_CONSIDER_LAPO',
    'width' => '10%',
    'default' => false,
  ),
  'AGREE_FOR_COMMUNICATIONS' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_AGREE_FOR_COMMUNICATIONS',
    'width' => '10%',
    'default' => false,
  ),
  'INFO_NEED_BEFORE_DECISION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INFO_NEED_BEFORE_DECISION',
    'width' => '10%',
    'default' => false,
  ),
  'RECEIVE_SUPPORT_DURING_CONSIDERATION' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_RECEIVE_SUPPORT_DURING_CONSIDERATION',
    'width' => '10%',
    'default' => false,
  ),
  'JD_OTHER' => 
  array (
    'type' => 'text',
    'label' => 'LBL_JD_OTHER',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'SPECIFY_OTHER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SPECIFY_OTHER',
    'width' => '10%',
    'default' => false,
  ),
);
;
?>
