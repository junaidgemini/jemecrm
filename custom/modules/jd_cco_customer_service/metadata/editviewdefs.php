<?php
$module_name = 'jd_cco_customer_service';
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
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'mobile',
            'label' => 'LBL_MOBILE',
          ),
          1 => 
          array (
            'name' => 'jd_telephone',
            'label' => 'LBL_JD_TELEPHONE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'jd_to_date',
            'label' => 'LBL_JD_TO_DATE',
          ),
          1 => 
          array (
            'name' => 'jd_from_date',
            'label' => 'LBL_JD_FROM_DATE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'jd_customer_no',
            'label' => 'LBL_JD_CUSTOMER_NO',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
;
?>
