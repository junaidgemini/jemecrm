<?php
$module_name = 'jd_BSO_ceo_union_weekly_report';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
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
            'name' => 'jd_zone',
            'label' => 'LBL_JD_ZONE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'jd_branch_state',
            'label' => 'LBL_JD_BRANCH_STATE',
          ),
          1 => 
          array (
            'name' => 'jd_branch',
            'label' => 'LBL_JD_BRANCH',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'demography',
            'label' => 'LBL_DEMOGRAPHY',
          ),
          1 => 
          array (
            'name' => 'branch_email',
            'label' => 'LBL_BRANCH_EMAIL',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'date_of_visit',
            'label' => 'LBL_DATE_OF_VISIT',
          ),
          1 => 
          array (
            'name' => 'purpose_of_visit',
            'label' => 'LBL_PURPOSE_OF_VISIT',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'jd_status',
            'label' => 'LBL_JD_STATUS',
          ),
          1 => 
          array (
            'name' => 'any_aditional_feedback',
            'label' => 'LBL_ANY_ADITIONAL_FEEDBACK',
          ),
        ),
        5 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
;
?>
