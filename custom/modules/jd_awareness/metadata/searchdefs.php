<?php
$module_name = 'jd_awareness';
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
      'recieve_promotion' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_RECIEVE_PROMOTION',
        'width' => '10%',
        'default' => true,
        'name' => 'recieve_promotion',
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
      'attraction' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ATTRACTION',
        'width' => '10%',
        'default' => true,
        'name' => 'attraction',
      ),
      'lapo_hearing' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_LAPO_HEARING',
        'width' => '10%',
        'default' => true,
        'name' => 'lapo_hearing',
      ),
      'lapo_engagement_info' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_LAPO_ENGAGEMENT_INFO',
        'width' => '10%',
        'default' => true,
        'name' => 'lapo_engagement_info',
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
