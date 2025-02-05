<?php
$module_name = 'jd_customer_satisfaction';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ENGAGMENT_PURPOSE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_ENGAGMENT_PURPOSE',
    'width' => '10%',
    'default' => true,
  ),
  'BRANCH_LOCATION' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_BRANCH_LOCATION',
    'width' => '10%',
    'default' => true,
  ),
  'PRIORITY' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_PRIORITY',
    'width' => '10%',
    'default' => true,
  ),
  'CUSTOMER_INTERACTION_STATUS' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_CUSTOMER_INTERACTION_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'CUSTOMER_TYPE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_CUSTOMER_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
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
  'ANY_ADDITIONAL_FEEDBACK' => 
  array (
    'type' => 'text',
    'label' => 'LBL_ANY_ADDITIONAL_FEEDBACK',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'CUSTOMER_SALUTATION' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_CUSTOMER_SALUTATION',
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
  'BUSNIESS_TYPE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_BUSNIESS_TYPE',
    'width' => '10%',
    'default' => false,
  ),
  'ENGAGMENT_TYPE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_ENGAGMENT_TYPE',
    'width' => '10%',
    'default' => false,
  ),
  'DEMOGRAPHY' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_DEMOGRAPHY',
    'width' => '10%',
    'default' => false,
  ),
  'EDUCATION_LEVEL' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_EDUCATION_LEVEL',
    'width' => '10%',
    'default' => false,
  ),
  'BRANCH_EMAILS' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_BRANCH_EMAILS',
    'width' => '10%',
    'default' => false,
  ),
  'STATE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_STATE',
    'width' => '10%',
    'default' => false,
  ),
  'DESCRIPTION_REQUEST_INQUIRY' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION_REQUEST_INQUIRY',
    'sortable' => false,
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
  'MOBILE' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_MOBILE',
    'width' => '10%',
    'default' => false,
  ),
  'RECOMMENDATION_RATING' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_RECOMMENDATION_RATING',
    'width' => '10%',
    'default' => false,
  ),
  'SATISFACTION_RATING' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_SATISFACTION_RATING',
    'width' => '10%',
    'default' => false,
  ),
  'ENGAGMENT_PURPOSE_SUB_OPTIONS' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_ENGAGMENT_PURPOSE_SUB_OPTIONS',
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
  'SUGARFIELD_SUMMARY_OF_INQUIRY_COMPLAIN_TREQUE' => 
  array (
    'type' => 'text',
    'label' => 'LBL_SUGARFIELD_SUMMARY_OF_INQUIRY_COMPLAIN_TREQUE',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'TIME_NEED_TO_RESOLVE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TIME_NEED_TO_RESOLVE',
    'width' => '10%',
    'default' => false,
  ),
  'AGE_GROUP' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_AGE_GROUP',
    'width' => '10%',
    'default' => false,
  ),
);
;
?>
