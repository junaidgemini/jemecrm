<?php
$module_name = 'jd_jd_BSO_ceo_branch_weekly_report';
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
      'useTabs' => true,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => true,
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
            'name' => 'jd_zone',
            'label' => 'LBL_JD_ZONE',
          ),
          1 => 
          array (
            'name' => 'jd_branch_state',
            'label' => 'LBL_JD_BRANCH_STATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'jd_branch',
            'label' => 'LBL_JD_BRANCH',
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
          0 => 'description',
          1 => 
          array (
            'name' => 'jd_status',
            'label' => 'LBL_JD_STATUS',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'escalation_officer_name',
            'label' => 'LBL_ESCALATION_OFFICER_NAME',
          ),
          1 => 
          array (
            'name' => 'escalation_officer_email',
            'label' => 'LBL_ESCALATION_OFFICER_EMAIL',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'escalation_officer',
            'label' => 'LBL_ESCALATION_OFFICER',
          ),
          1 => 
          array (
            'name' => 'specify_other',
            'label' => 'LBL_SPECIFY_OTHER',
          ),
        ),
      ),
    ),
  ),
);
;
?>
