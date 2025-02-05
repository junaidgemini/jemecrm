<?php
$module_name = 'jd_advocacy';
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
      'syncDetailEditViews' => false,
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
            'name' => 'email',
            'label' => 'LBL_EMAIL',
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
            'name' => 'gender',
            'label' => 'LBL_GENDER',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'occupation',
            'label' => 'LBL_OCCUPATION',
          ),
          1 => 
          array (
            'name' => 'specify_other_occupation',
            'label' => 'LBL_SPECIFY_OTHER_OCCUPATION',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'jd_zone',
            'label' => 'LBL_JD_ZONE',
          ),
          1 => 
          array (
            'name' => 'location',
            'label' => 'LBL_LOCATION',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'jd_branch',
            'label' => 'LBL_JD_BRANCH',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'recommend_to_others',
            'label' => 'LBL_RECOMMEND_TO_OTHERS',
          ),
          1 => 
          array (
            'name' => 'recommend_reason',
            'label' => 'LBL_RECOMMEND_REASON',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'recieve_communications',
            'label' => 'LBL_RECIEVE_COMMUNICATIONS',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'referral_program',
            'label' => 'LBL_REFERRAL_PROGRAM',
          ),
        ),
        9 => 
        array (
          0 => 'description',
        ),
        10 => 
        array (
          0 => 'assigned_user_name',
          1 => '',
        ),
      ),
    ),
  ),
);
;
?>
