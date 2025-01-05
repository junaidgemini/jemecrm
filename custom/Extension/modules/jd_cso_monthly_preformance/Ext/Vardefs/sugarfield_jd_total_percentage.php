<?php
$dictionary['jd_cso_monthly_preformance']['fields']['jd_total_percentage'] = array(
	'name' => 'jd_total_percentage',
	'vname' => 'LBL_JD_TOTAL_PERCENTAGE',
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