<?php
$module_name = 'jd_customer_satisfaction';
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
      'time_need_to_resolve' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TIME_NEED_TO_RESOLVE',
        'width' => '10%',
        'default' => true,
        'name' => 'time_need_to_resolve',
      ),
      'state' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_STATE',
        'width' => '10%',
        'default' => true,
        'name' => 'state',
      ),
      'branch_location' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_BRANCH_LOCATION',
        'width' => '10%',
        'default' => true,
        'name' => 'branch_location',
      ),
      'busniess_type' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_BUSNIESS_TYPE',
        'width' => '10%',
        'default' => true,
        'name' => 'busniess_type',
      ),
      'customer_type' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_CUSTOMER_TYPE',
        'width' => '10%',
        'default' => true,
        'name' => 'customer_type',
      ),
      'demography' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_DEMOGRAPHY',
        'width' => '10%',
        'default' => true,
        'name' => 'demography',
      ),
      'recommendation_rating' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_RECOMMENDATION_RATING',
        'width' => '10%',
        'default' => true,
        'name' => 'recommendation_rating',
      ),
      'sugarfield_summary_of_inquiry_complain_treque' => 
      array (
        'type' => 'text',
        'label' => 'LBL_SUGARFIELD_SUMMARY_OF_INQUIRY_COMPLAIN_TREQUE',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'sugarfield_summary_of_inquiry_complain_treque',
      ),
      'priority' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_PRIORITY',
        'width' => '10%',
        'default' => true,
        'name' => 'priority',
      ),
      'engagment_purpose' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_ENGAGMENT_PURPOSE',
        'width' => '10%',
        'default' => true,
        'name' => 'engagment_purpose',
      ),
      'engagment_type' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_ENGAGMENT_TYPE',
        'width' => '10%',
        'default' => true,
        'name' => 'engagment_type',
      ),
      'mobile' => 
      array (
        'type' => 'phone',
        'label' => 'LBL_MOBILE',
        'width' => '10%',
        'default' => true,
        'name' => 'mobile',
      ),
      'jd_zone' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_ZONE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_zone',
      ),
      'branch_emails' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_BRANCH_EMAILS',
        'width' => '10%',
        'default' => true,
        'name' => 'branch_emails',
      ),
      'engagment_purpose_sub_options' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_ENGAGMENT_PURPOSE_SUB_OPTIONS',
        'width' => '10%',
        'default' => true,
        'name' => 'engagment_purpose_sub_options',
      ),
      'education_level' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_EDUCATION_LEVEL',
        'width' => '10%',
        'default' => true,
        'name' => 'education_level',
      ),
      'satisfaction_rating' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_SATISFACTION_RATING',
        'width' => '10%',
        'default' => true,
        'name' => 'satisfaction_rating',
      ),
      'customer_interaction_status' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_CUSTOMER_INTERACTION_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'customer_interaction_status',
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
