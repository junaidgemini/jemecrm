<?php
$module_name = 'jd_cso_monthly_preformance';
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
            'name' => 'jd_cso_name',
            'label' => 'LBL_JD_CSO_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'jd_cso_zone',
            'label' => 'LBL_JD_CSO_ZONE',
          ),
          1 => 
          array (
            'name' => 'jd_cso_branch_state',
            'label' => 'LBL_JD_CSO_BRANCH_STATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'jd_cso_branch',
            'label' => 'LBL_JD_CSO_BRANCH',
          ),
          1 => 
          array (
            'name' => 'jd_cso_branch_size',
            'label' => 'LBL_JD_CSO_BRANCH_SIZE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'jd_cso_month',
            'label' => 'LBL_JD_CSO_MONTH',
          ),
          1 => 'assigned_user_name',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'jd_cso_disbursement_target',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_JD_CSO_DISBURSEMENT_TARGET',
          ),
          1 => 
          array (
            'name' => 'jd_cso_disbursement_actual',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_JD_CSO_DISBURSEMENT_ACTUAL',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'jd_cso_loan_portfolio_target',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_JD_CSO_LOAN_PORTFOLIO_TARGET',
          ),
          1 => 
          array (
            'name' => 'jd_cso_loan_portfolio_actual',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_JD_CSO_LOAN_PORTFOLIO_ACTUAL',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'jd_cso_new_clients_target',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_JD_CSO_NEW_CLIENTS_TARGET',
          ),
          1 => 
          array (
            'name' => 'jd_cso_new_clients_actual',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_JD_CSO_NEW_CLIENTS_ACTUAL',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'jd_cso_deposit_mobilised_target',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_JD_CSO_DEPOSIT_MOBILISED_TARGET',
          ),
          1 => 
          array (
            'name' => 'jd_cso_deposit_mobilised_actual',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_JD_CSO_DEPOSIT_MOBILISED_ACTUAL',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'jd_cso_deposit_balance_target',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_JD_CSO_DEPOSIT_BALANCE_TARGET',
          ),
          1 => 
          array (
            'name' => 'jd_cso_deposit_balance_actual',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_JD_CSO_DEPOSIT_BALANCE_ACTUAL',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'jd_cso_amount_of_loan_overdue',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_JD_CSO_AMOUNT_OF_LOAN_OVERDUE',
          ),
          1 => 
          array (
            'name' => 'jd_cso_balance_of_Defaulter',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_JD_CSO_BALANCE_OF_DEFAULTER',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'jd_cso_clients_target',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_JD_CSO_CLIENTS_TARGET',
          ),
          1 => 
          array (
            'name' => 'jd_cso_clients_actual',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_JD_CSO_CLIENTS_ACTUAL',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'jd_cso_borrowers_actual',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_JD_CSO_BORROWERS_ACTUAL',
          ),
          1 => 
          array (
            'name' => 'jd_cso_total_borrowers',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_JD_CSO_TOTAL_BORROWERS',
          ),
        ),
        12 => 
        array (
          0 => 'description',
          1 => '',
        ),
      ),
    ),
  ),
);
;
?>
