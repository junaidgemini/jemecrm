<?php
$module_name = 'jd_user_replacement';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'jd_primary_user_name',
            'label' => 'LBL_JD_PRIMARY_USER_NAME',
          ),
          1 => 
          array (
            'name' => 'jd_acting_user_name',
            'label' => 'LBL_JD_ACTING_USER_NAME',
          ),
        ),
        1 => 
        array (
          0 => 'name',
          1 => 'description',
        ),
      ),
    ),
  ),
);
;
?>