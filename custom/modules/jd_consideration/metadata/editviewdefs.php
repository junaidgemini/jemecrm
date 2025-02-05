<?php
$module_name = 'jd_consideration';
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
            'name' => 'mobile',
            'label' => 'LBL_MOBILE',
          ),
          1 => 
          array (
            'name' => 'email',
            'label' => 'LBL_EMAIL',
          ),
        ),
        2 => 
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
        3 => 
        array (
          0 => 
          array (
            'name' => 'jd_branch',
            'label' => 'LBL_JD_BRANCH',
          ),
          1 => '',
        ),
        4 => 
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
        5 => 
        array (
          0 => 
          array (
            'name' => 'gender',
            'label' => 'LBL_GENDER',
          ),
          1 => 
          array (
            'name' => 'agree_for_communications',
            'label' => 'LBL_AGREE_FOR_COMMUNICATIONS',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'factors_decision_to_consider_lapo',
            'studio' => 'visible',
            'label' => 'LBL_FACTORS_DECISION_TO_CONSIDER_LAPO',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'info_need_before_decision',
            'label' => 'LBL_INFO_NEED_BEFORE_DECISION',
          ),
          1 => 
          array (
            'name' => 'receive_support_during_consideration',
            'label' => 'LBL_RECEIVE_SUPPORT_DURING_CONSIDERATION',
          ),
        ),
        8 => 
        array (
          0 => 'description',
        ),
        9 => 
        array (
          0 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
;
?>
