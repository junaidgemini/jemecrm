<?php
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
?>