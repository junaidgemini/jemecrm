<?php
$module_name = 'jd_customer_satisfaction';
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
          0 => 
          array (
            'name' => 'customer_salutation',
            'label' => 'LBL_CUSTOMER_SALUTATION',
          ),
          1 => 'name',
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
            'name' => 'customer_type',
            'label' => 'LBL_CUSTOMER_TYPE',
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
            'name' => 'state',
            'label' => 'LBL_STATE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'branch_location',
            'label' => 'LBL_BRANCH_LOCATION',
          ),
          1 => 
          array (
            'name' => 'branch_emails',
            'label' => 'LBL_BRANCH_EMAILS',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'demography',
            'label' => 'LBL_DEMOGRAPHY',
          ),
          1 => 
          array (
            'name' => 'education_level',
            'label' => 'LBL_EDUCATION_LEVEL',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'age_group',
            'label' => 'LBL_AGE_GROUP',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'busniess_type',
            'label' => 'LBL_BUSNIESS_TYPE',
          ),
          1 => 
          array (
            'name' => 'specify_business_other',
            'label' => 'LBL_SPECIFY_BUSINESS_OTHER',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'engagment_purpose',
            'label' => 'LBL_ENGAGMENT_PURPOSE',
          ),
          1 => 
          array (
            'name' => 'specify_purpose_of_engagment_other',
            'label' => 'LBL_SPECIFY_PURPOSE_OF_ENGAGMENT_OTHER',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'engagment_type',
            'label' => 'LBL_ENGAGMENT_TYPE',
          ),
          1 => 
          array (
            'name' => 'specify_engagment_other',
            'label' => 'LBL_SPECIFY_ENGAGMENT_OTHER',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'engagment_purpose_sub_options',
            'label' => 'LBL_ENGAGMENT_PURPOSE_SUB_OPTIONS',
          ),
          1 => '',
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'time_need_to_resolve',
            'label' => 'LBL_TIME_NEED_TO_RESOLVE',
          ),
          1 => 
          array (
            'name' => 'priority',
            'label' => 'LBL_PRIORITY',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'customer_interaction_status',
            'label' => 'LBL_CUSTOMER_INTERACTION_STATUS',
          ),
          1 => 
          array (
            'name' => 'gender',
            'label' => 'LBL_GENDER',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'recommendation_rating',
            'label' => 'LBL_RECOMMENDATION_RATING',
          ),
          1 => 
          array (
            'name' => 'satisfaction_rating',
            'label' => 'LBL_SATISFACTION_RATING',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'sugarfield_summary_of_inquiry_complain_treque',
            'label' => 'LBL_SUGARFIELD_SUMMARY_OF_INQUIRY_COMPLAIN_TREQUE',
          ),
          1 => 
          array (
            'name' => 'description_request_inquiry',
            'label' => 'LBL_DESCRIPTION_REQUEST_INQUIRY',
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'any_additional_feedback',
            'label' => 'LBL_ANY_ADDITIONAL_FEEDBACK',
          ),
        ),
        15 => 
        array (
          0 => 'assigned_user_name',
          1 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
        ),
      ),
    ),
  ),
);
;
?>
