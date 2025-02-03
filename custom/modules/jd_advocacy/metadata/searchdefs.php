<?php
$module_name = 'jd_advocacy';
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
      'customer_full_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CUSTOMER_FULL_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'customer_full_name',
      ),
      'mobile' => 
      array (
        'type' => 'phone',
        'label' => 'LBL_MOBILE',
        'width' => '10%',
        'default' => true,
        'name' => 'mobile',
      ),
      'gender' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_GENDER',
        'width' => '10%',
        'default' => true,
        'name' => 'gender',
      ),
      'jd_zone' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_ZONE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_zone',
      ),
      'location' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_LOCATION',
        'width' => '10%',
        'default' => true,
        'name' => 'location',
      ),
      'jd_branch' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_BRANCH',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_branch',
      ),
      'referral_program' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_REFERRAL_PROGRAM',
        'width' => '10%',
        'default' => true,
        'name' => 'referral_program',
      ),
      'email' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL',
        'width' => '10%',
        'default' => true,
        'name' => 'email',
      ),
      'recommend_to_others' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_RECOMMEND_TO_OTHERS',
        'width' => '10%',
        'default' => true,
        'name' => 'recommend_to_others',
      ),
      'recieve_communications' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_RECIEVE_COMMUNICATIONS',
        'width' => '10%',
        'default' => true,
        'name' => 'recieve_communications',
      ),
      'description' => 
      array (
        'type' => 'text',
        'label' => 'LBL_DESCRIPTION',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'description',
      ),
      'recommend_reason' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_RECOMMEND_REASON',
        'width' => '10%',
        'default' => true,
        'name' => 'recommend_reason',
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
