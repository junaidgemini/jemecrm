<?php
$module_name = 'jd_awareness';
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
  'MOBILE' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_MOBILE',
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
  'JD_ZONE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_JD_ZONE',
    'width' => '10%',
    'default' => true,
  ),
  'RECIEVE_PROMOTION' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_RECIEVE_PROMOTION',
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
  'GENDER' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_GENDER',
    'width' => '10%',
    'default' => true,
  ),
  'ATTRACTION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ATTRACTION',
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
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => false,
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
  'LAPO_HEARING' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_LAPO_HEARING',
    'width' => '10%',
    'default' => false,
  ),
  'COMMENTS' => 
  array (
    'type' => 'text',
    'label' => 'LBL_COMMENTS',
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
  'LAPO_ENGAGEMENT_INFO' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_LAPO_ENGAGEMENT_INFO',
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
);
;
?>
