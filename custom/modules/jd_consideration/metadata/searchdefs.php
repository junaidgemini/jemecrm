<?php
$module_name = 'jd_consideration';
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
      'email' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL',
        'width' => '10%',
        'default' => true,
        'name' => 'email',
      ),
      'agree_for_communications' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_AGREE_FOR_COMMUNICATIONS',
        'width' => '10%',
        'default' => true,
        'name' => 'agree_for_communications',
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
      'occupation' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_OCCUPATION',
        'width' => '10%',
        'default' => true,
        'name' => 'occupation',
      ),
      'receive_support_during_consideration' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_RECEIVE_SUPPORT_DURING_CONSIDERATION',
        'width' => '10%',
        'default' => true,
        'name' => 'receive_support_during_consideration',
      ),
      'decision_to_consider_lapo' => 
      array (
        'type' => 'multienum',
        'studio' => 'visible',
        'label' => 'LBL_DECISION_TO_CONSIDER_LAPO',
        'width' => '10%',
        'default' => true,
        'name' => 'decision_to_consider_lapo',
      ),
      'info_need_before_decision' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INFO_NEED_BEFORE_DECISION',
        'width' => '10%',
        'default' => true,
        'name' => 'info_need_before_decision',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
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
