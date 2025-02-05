<?php
$module_name = 'jd_user_replacement';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'JD_ACTING_USER_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_JD_ACTING_USER_NAME',
    'id' => 'JD_ACTING_USER_ID',
    'width' => '10%',
    'default' => true,
  ),
  'JD_PRIMARY_USER_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_JD_PRIMARY_USER_NAME',
    'id' => 'JD_PRIMARY_USER_ID',
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
);
;
?>
