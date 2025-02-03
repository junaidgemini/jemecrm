<?php
$module_name = 'jd_BSO_ceo_union_weekly_report';
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
      'date_of_visit' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DATE_OF_VISIT',
        'width' => '10%',
        'default' => true,
        'name' => 'date_of_visit',
      ),
      'jd_status' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_status',
      ),
      'jd_zone' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_ZONE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_zone',
      ),
      'jd_branch_state' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_BRANCH_STATE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_branch_state',
      ),
      'jd_branch' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_BRANCH',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_branch',
      ),
      'branch_email' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_BRANCH_EMAIL',
        'width' => '10%',
        'default' => true,
        'name' => 'branch_email',
      ),
      'purpose_of_visit' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PURPOSE_OF_VISIT',
        'width' => '10%',
        'default' => true,
        'name' => 'purpose_of_visit',
      ),
      'demography' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_DEMOGRAPHY',
        'width' => '10%',
        'default' => true,
        'name' => 'demography',
      ),
      'any_aditional_feedback' => 
      array (
        'type' => 'text',
        'label' => 'LBL_ANY_ADITIONAL_FEEDBACK',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'any_aditional_feedback',
      ),
      'escalation_officer_email' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ESCALATION_OFFICER_EMAIL',
        'width' => '10%',
        'default' => true,
        'name' => 'escalation_officer_email',
      ),
      'escalation_officer_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ESCALATION_OFFICER_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'escalation_officer_name',
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
