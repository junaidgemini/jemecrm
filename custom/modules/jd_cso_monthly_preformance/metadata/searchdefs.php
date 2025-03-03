<?php
$module_name = 'jd_cso_monthly_preformance';
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
      'jd_cso_zone' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_CSO_ZONE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_zone',
      ),
      'jd_cso_branch_state' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_CSO_BRANCH_STATE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_branch_state',
      ),
      'jd_cso_branch' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_CSO_BRANCH',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_branch',
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
        'width' => '10%',
        'default' => true,
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'date_modified' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
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
