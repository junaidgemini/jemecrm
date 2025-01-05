<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_amount_of_loan_overdue'] = array(
	'name' => 'jd_cso_amount_of_loan_overdue',
	'vname' => 'LBL_JD_CSO_AMOUNT_OF_LOAN_OVERDUE',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_balance_of_Defaulter'] = array(
	'name' => 'jd_cso_balance_of_Defaulter',
	'vname' => 'LBL_JD_CSO_BALANCE_OF_DEFAULTER',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_borrowers_actual'] = array(
	'name' => 'jd_cso_borrowers_actual',
	'vname' => 'LBL_JD_CSO_BORROWERS_ACTUAL',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_branch'] = array(
	'name' => 'jd_cso_branch',
	'vname' => 'LBL_JD_CSO_BRANCH',
	'type' => 'enum',
	'options' => 'jd_cso_branch_dom',
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => true,
	'reportable' => true,
	'required' => true,
	'unified_search' => false,
	'merge_filter' => 'disabled',
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_branch_size'] = array(
	'name' => 'jd_cso_branch_size',
	'vname' => 'LBL_JD_CSO_BRANCH_SIZE',
	'type' => 'enum',
	'options' => 'jd_cso_branch_size_dom',
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => true,
	'reportable' => true,
	'required' => true,
	'unified_search' => false,
	'merge_filter' => 'disabled',
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_branch_state'] = array(
	'name' => 'jd_cso_branch_state',
	'vname' => 'LBL_JD_CSO_BRANCH_STATE',
	'type' => 'enum',
	'options' => 'jd_cso_branch_state_dom',
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => true,
	'reportable' => true,
	'required' => true,
	'unified_search' => false,
	'merge_filter' => 'disabled',
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_clients_actual'] = array(
	'name' => 'jd_cso_clients_actual',
	'vname' => 'LBL_JD_CSO_CLIENTS_ACTUAL',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_clients_target'] = array(
	'name' => 'jd_cso_clients_target',
	'vname' => 'LBL_JD_CSO_CLIENTS_TARGET',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_deposit_balance'] = array(
	'name' => 'jd_cso_deposit_balance',
	'vname' => 'LBL_JD_CSO_DEPOSIT_BALANCE',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_deposit_balance_actual'] = array(
	'name' => 'jd_cso_deposit_balance_actual',
	'vname' => 'LBL_JD_CSO_DEPOSIT_BALANCE_ACTUAL',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_deposit_balance_target'] = array(
	'name' => 'jd_cso_deposit_balance_target',
	'vname' => 'LBL_JD_CSO_DEPOSIT_BALANCE_TARGET',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_deposit_mobilised_actual'] = array(
	'name' => 'jd_cso_deposit_mobilised_actual',
	'vname' => 'LBL_JD_CSO_DEPOSIT_MOBILISED_ACTUAL',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_deposit_mobilised_balance'] = array(
	'name' => 'jd_cso_deposit_mobilised_balance',
	'vname' => 'LBL_JD_CSO_DEPOSIT_MOBILISED_BALANCE',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_deposit_mobilised_percent'] = array(
	'name' => 'jd_cso_deposit_mobilised_percent',
	'vname' => 'LBL_JD_CSO_DEPOSIT_MOBILISED_PERCENT',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_deposit_mobilised_target'] = array(
	'name' => 'jd_cso_deposit_mobilised_target',
	'vname' => 'LBL_JD_CSO_DEPOSIT_MOBILISED_TARGET',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_disbursement_actual'] = array(
	'name' => 'jd_cso_disbursement_actual',
	'vname' => 'LBL_JD_CSO_DISBURSEMENT_ACTUAL',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_disbursement_percent'] = array(
	'name' => 'jd_cso_disbursement_percent',
	'vname' => 'LBL_JD_CSO_DISBURSEMENT_PERCENT',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_disbursement_target'] = array(
	'name' => 'jd_cso_disbursement_target',
	'vname' => 'LBL_JD_CSO_DISBURSEMENT_TARGET',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_loan_portfolio_actual'] = array(
	'name' => 'jd_cso_loan_portfolio_actual',
	'vname' => 'LBL_JD_CSO_LOAN_PORTFOLIO_ACTUAL',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_loan_portfolio_percent'] = array(
	'name' => 'jd_cso_loan_portfolio_percent',
	'vname' => 'LBL_JD_CSO_LOAN_PORTFOLIO_PERCENT',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_loan_portfolio_target'] = array(
	'name' => 'jd_cso_loan_portfolio_target',
	'vname' => 'LBL_JD_CSO_LOAN_PORTFOLIO_TARGET',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_month'] = array(
	'name' => 'jd_cso_month',
	'vname' => 'LBL_JD_CSO_MONTH',
	'type' => 'datetime',
	'importable' => 'true',
	'audited' => true,
	'reportable' => true,
	'required' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_name'] = array(
	'name' => 'jd_cso_name',
	'vname' => 'LBL_JD_CSO_NAME',
	'required' => true,
    'type' => 'varchar',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => true,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'len' => '255',
    'size' => '20',
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_new_client_percent'] = array(
	'name' => 'jd_cso_new_client_percent',
	'vname' => 'LBL_JD_CSO_NEW_CLIENT_PERCENT',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_new_clients_actual'] = array(
	'name' => 'jd_cso_new_clients_actual',
	'vname' => 'LBL_JD_CSO_NEW_CLIENTS_ACTUAL',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_new_clients_target'] = array(
	'name' => 'jd_cso_new_clients_target',
	'vname' => 'LBL_JD_CSO_NEW_CLIENTS_TARGET',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_overall_score'] = array(
	'name' => 'jd_cso_overall_score',
	'vname' => 'LBL_JD_CSO_OVERALL_SCORE',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_par_grade_actual_score'] = array(
	'name' => 'jd_cso_par_grade_actual_score',
	'vname' => 'LBL_JD_CSO_PAR_GRADE_ACTUAL_SCORE',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_par_percent'] = array(
	'name' => 'jd_cso_par_percent',
	'vname' => 'LBL_JD_CSO_PAR_PERCENT',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_total_borrowers'] = array(
	'name' => 'jd_cso_total_borrowers',
	'vname' => 'LBL_JD_CSO_TOTAL_BORROWERS',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_total_par_grade'] = array(
	'name' => 'jd_cso_total_par_grade',
	'vname' => 'LBL_JD_CSO_TOTAL_PAR_GRADE',
    'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);


$dictionary['jd_cso_monthly_preformance']['fields']['jd_cso_zone'] = array(
	'name' => 'jd_cso_zone',
	'vname' => 'LBL_JD_CSO_ZONE',
	'type' => 'enum',
	'options' => 'jd_tasks_zone_dom',
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => true,
	'reportable' => true,
	'required' => true,
	'unified_search' => false,
	'merge_filter' => 'disabled',
);

?>