<?php
$module_name = 'jd_retention';
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
          0 => 'name',
          1 => 
          array (
            'name' => 'customer_full_name',
            'label' => 'LBL_CUSTOMER_FULL_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'jd_zone',
            'label' => 'LBL_JD_ZONE',
          ),
          1 => 
          array (
            'name' => 'mobile',
            'label' => 'LBL_MOBILE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'occupation',
            'label' => 'LBL_OCCUPATION',
          ),
          1 => 
          array (
            'name' => 'location',
            'label' => 'LBL_LOCATION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'gender',
            'label' => 'LBL_GENDER',
          ),
          1 => 
          array (
            'name' => 'jd_other',
            'label' => 'LBL_JD_OTHER',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'get_additional_service',
            'label' => 'LBL_GET_ADDITIONAL_SERVICE',
          ),
          1 => 
          array (
            'name' => 'specify_additional_service',
            'label' => 'LBL_SPECIFY_ADDITIONAL_SERVICE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'satisfaction',
            'label' => 'LBL_SATISFACTION',
          ),
          1 => 
          array (
            'name' => 'comments',
            'label' => 'LBL_COMMENTS',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'recieve_communications',
            'label' => 'LBL_RECIEVE_COMMUNICATIONS',
          ),
          1 => 'description',
        ),
      ),
    ),
  ),
);
;
?>