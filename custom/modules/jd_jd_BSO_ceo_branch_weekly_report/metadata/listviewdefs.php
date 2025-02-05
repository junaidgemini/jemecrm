<?php
$module_name = 'jd_jd_BSO_ceo_branch_weekly_report';
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
  'JD_STATUS' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_JD_STATUS',
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
  'JD_BRANCH_STATE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_JD_BRANCH_STATE',
    'width' => '10%',
    'default' => true,
  ),
  'JD_BRANCH' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_JD_BRANCH',
    'width' => '10%',
    'default' => true,
  ),
  'PURPOSE_OF_VISIT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PURPOSE_OF_VISIT',
    'width' => '10%',
    'default' => true,
  ),
  'DEMOGRAPHY' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_DEMOGRAPHY',
    'width' => '10%',
    'default' => true,
  ),
  'ESCALATION_OFFICER_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ESCALATION_OFFICER_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'ESCALATION_OFFICER_EMAIL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ESCALATION_OFFICER_EMAIL',
    'width' => '10%',
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
  'SPECIFY_OTHER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SPECIFY_OTHER',
    'width' => '10%',
    'default' => false,
  ),
  'ESCALATION_OFFICER' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_ESCALATION_OFFICER',
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
  'BRANCH_EMAIL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BRANCH_EMAIL',
    'width' => '10%',
    'default' => false,
  ),
  'ANY_ADITIONAL_FEEDBACK' => 
  array (
    'type' => 'text',
    'label' => 'LBL_ANY_ADITIONAL_FEEDBACK',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'DATE_OF_VISIT' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DATE_OF_VISIT',
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
