<?php
$searchdefs ['Users'] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 
      array (
        'name' => 'search_name',
        'label' => 'LBL_NAME',
        'type' => 'name',
      ),
    ),
    'advanced_search' => 
    array (
      'user_name' => 
      array (
        'name' => 'user_name',
        'default' => true,
        'width' => '10%',
      ),
      'jd_roles_c' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_ROLES_C',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_roles_c',
      ),
      'status' => 
      array (
        'name' => 'status',
        'default' => true,
        'width' => '10%',
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
      'jd_branch_size' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_BRANCH_SIZE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_branch_size',
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
