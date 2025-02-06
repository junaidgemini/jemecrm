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
          1 => 
          array (
            'name' => 'demography',
            'label' => 'LBL_DEMOGRAPHY',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'leader_phone_name',
            'label' => 'LBL_LEADER_PHONE_NAME',
          ),
          1 => 
          array (
            'name' => 'leader_phone_number',
            'label' => 'LBL_LEADER_PHONE_NUMBER',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'union_id',
            'label' => 'LBL_UNION_ID',
          ),
          1 => 
          array (
            'name' => 'no_of_member_in_union',
            'label' => 'LBL_NO_OF_MEMBER_IN_UNION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'union_experiance',
            'label' => 'LBL_UNION_EXPERIANCE',
          ),
          1 => '',
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
            'name' => 'jd_branch_state',
            'label' => 'LBL_JD_BRANCH_STATE',
          ),
        ),
        5 => 
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
        6 => 
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
        7 => 
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
        8 => 
        array (
          0 => 'description',
        ),
        9 => 
        array (
          0 => 'assigned_user_name',
          1 => '',
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
            'name' => 'specify_other_escalation_officer',
            'label' => 'LBL_SPECIFY_OTHER_ESCALATION_OFFICER',
          ),
        ),
      ),
    ),
  ),
);
;
?>
