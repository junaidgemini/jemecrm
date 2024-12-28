<?php
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
?>