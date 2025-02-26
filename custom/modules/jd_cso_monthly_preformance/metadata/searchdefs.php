<?php
$module_name = 'jd_cso_monthly_preformance';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'jd_cso_branch_state' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_CSO_BRANCH_STATE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_branch_state',
      ),
      'jd_cso_zone' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_CSO_ZONE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_zone',
      ),
      'jd_cso_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_JD_CSO_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_name',
      ),
      'jd_cso_branch_size' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_CSO_BRANCH_SIZE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_branch_size',
      ),
      'jd_cso_deposit_balance_target' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_DEPOSIT_BALANCE_TARGET',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_deposit_balance_target',
      ),
      'jd_cso_branch' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_CSO_BRANCH',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_branch',
      ),
      'jd_total_percentage' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_TOTAL_PERCENTAGE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_total_percentage',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
      'jd_new_client_valid_percent' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_NEW_CLIENT_VALID_PERCENT',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_new_client_valid_percent',
      ),
      'jd_cso_new_clients_actual' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_NEW_CLIENTS_ACTUAL',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_new_clients_actual',
      ),
      'jd_cso_clients_actual' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_CLIENTS_ACTUAL',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_clients_actual',
      ),
      'jd_cso_new_clients_target' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_NEW_CLIENTS_TARGET',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_new_clients_target',
      ),
      'jd_cso_total_borrowers' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_JD_CSO_TOTAL_BORROWERS',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_total_borrowers',
      ),
      'jd_borrowers_actual_score' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_JD_BORROWERS_ACTUAL_SCORE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_borrowers_actual_score',
      ),
      'jd_cso_borrowers_actual' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_JD_CSO_BORROWERS_ACTUAL',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_borrowers_actual',
      ),
      'jd_cso_overall_score' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_OVERALL_SCORE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_overall_score',
      ),
      'jd_cso_total_par_grade' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_TOTAL_PAR_GRADE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_total_par_grade',
      ),
      'jd_deposit_balance_valid_percent' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_DEPOSIT_BALANCE_VALID_PERCENT',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_deposit_balance_valid_percent',
      ),
      'jd_cso_deposit_balance' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_DEPOSIT_BALANCE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_deposit_balance',
      ),
      'jd_cso_deposit_mobilised_actual' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_DEPOSIT_MOBILISED_ACTUAL',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_deposit_mobilised_actual',
      ),
      'jd_deposit_mobilise_valid_percent' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_DEPOSIT_MOBILISE_VALID_PERCENT',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_deposit_mobilise_valid_percent',
      ),
      'jd_disbursement_valid_percent' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_DISBURSEMENT_VALID_PERCENT',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_disbursement_valid_percent',
      ),
      'jd_total_perfomance_grade' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_TOTAL_PERFOMANCE_GRADE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_total_perfomance_grade',
      ),
      'jd_cso_loan_portfolio_actual' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_LOAN_PORTFOLIO_ACTUAL',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_loan_portfolio_actual',
      ),
      'jd_loan_portfolio_valid_percent' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_LOAN_PORTFOLIO_VALID_PERCENT',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_loan_portfolio_valid_percent',
      ),
      'jd_cso_loan_portfolio_target' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_LOAN_PORTFOLIO_TARGET',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_loan_portfolio_target',
      ),
      'jd_cso_month' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_JD_CSO_MONTH',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_month',
      ),
      'jd_cso_disbursement_actual' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_DISBURSEMENT_ACTUAL',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_disbursement_actual',
      ),
      'jd_cso_disbursement_target' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_DISBURSEMENT_TARGET',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_disbursement_target',
      ),
      'jd_cso_deposit_mobilised_balance' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_DEPOSIT_MOBILISED_BALANCE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_deposit_mobilised_balance',
      ),
      'jd_cso_amount_of_loan_overdue' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_AMOUNT_OF_LOAN_OVERDUE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_amount_of_loan_overdue',
      ),
      'jd_cso_deposit_mobilised_percent' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_DEPOSIT_MOBILISED_PERCENT',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_deposit_mobilised_percent',
      ),
      'jd_cso_deposit_mobilised_target' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_DEPOSIT_MOBILISED_TARGET',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_deposit_mobilised_target',
      ),
      'jd_cso_loan_portfolio_percent' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_LOAN_PORTFOLIO_PERCENT',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_loan_portfolio_percent',
      ),
      'jd_cso_new_client_percent' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_NEW_CLIENT_PERCENT',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_new_client_percent',
      ),
      'jd_cso_disbursement_percent' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_DISBURSEMENT_PERCENT',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_disbursement_percent',
      ),
      'jd_performance_grade_actual_score' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_JD_PERFORMANCE_GRADE_ACTUAL_SCORE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_performance_grade_actual_score',
      ),
      'jd_cso_deposit_balance_actual' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_DEPOSIT_BALANCE_ACTUAL',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_deposit_balance_actual',
      ),
      'jd_cso_par_grade_actual_score' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_PAR_GRADE_ACTUAL_SCORE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_par_grade_actual_score',
      ),
      'jd_cso_clients_target' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_CLIENTS_TARGET',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_clients_target',
      ),
      'jd_cso_par_percent' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_JD_CSO_PAR_PERCENT',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_cso_par_percent',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
;
?>
