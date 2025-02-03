<?php
$module_name = 'jd_aggregator_agents';
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
      'email' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL',
        'width' => '10%',
        'default' => true,
        'name' => 'email',
      ),
      'dob' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DOB',
        'width' => '10%',
        'default' => true,
        'name' => 'dob',
      ),
      'nin' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NIN',
        'width' => '10%',
        'default' => true,
        'name' => 'nin',
      ),
      'bvn' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_BVN',
        'width' => '10%',
        'default' => true,
        'name' => 'bvn',
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
