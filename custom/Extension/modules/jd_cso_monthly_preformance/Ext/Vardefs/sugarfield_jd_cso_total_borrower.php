<?php
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
?>