<?php
$module_name = 'jd_purchase';
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
  'GENDER' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_GENDER',
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
  'EMAIL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL',
    'width' => '10%',
    'default' => true,
  ),
  'EXPERIENCE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_EXPERIENCE',
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
  'QUERY_RESPONSE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_QUERY_RESPONSE',
    'width' => '10%',
    'default' => false,
  ),
  'PRODUCTS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_PRODUCTS',
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
  'RECIEVE_COMMUNICATIONS' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_RECIEVE_COMMUNICATIONS',
    'width' => '10%',
    'default' => false,
  ),
);
;
?>
