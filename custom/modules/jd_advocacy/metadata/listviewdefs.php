<?php
$module_name = 'jd_advocacy';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'OCCUPATION' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_OCCUPATION',
    'width' => '10%',
    'default' => false,
  ),
  'MOBILE' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_MOBILE',
    'width' => '10%',
    'default' => false,
  ),
  'LOCATION' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_LOCATION',
    'width' => '10%',
    'default' => false,
  ),
  'JD_ZONE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_JD_ZONE',
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
  'GENDER' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_GENDER',
    'width' => '10%',
    'default' => false,
  ),
  'CUSTOMER_FULL_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CUSTOMER_FULL_NAME',
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
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'EMAIL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL',
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
  'MODIFIED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_MODIFIED_NAME',
    'id' => 'MODIFIED_USER_ID',
    'width' => '10%',
    'default' => false,
  ),
  'RECOMMEND_REASON' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RECOMMEND_REASON',
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
  'RECOMMEND_TO_OTHERS' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_RECOMMEND_TO_OTHERS',
    'width' => '10%',
    'default' => false,
  ),
  'REFERRAL_PROGRAM' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_REFERRAL_PROGRAM',
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
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => false,
  ),
);
;
?>
