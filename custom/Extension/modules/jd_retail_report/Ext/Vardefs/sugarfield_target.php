<?php
$dictionary['jd_retail_report']['fields']['target'] = array(
	'name' => 'target',
	'vname' => 'LBL_TARGET',
	'type' => 'decimal', // Specifies the field type as decimal
    'len' => '18',       // Total length of the number
    'precision' => '2',  // Number of decimal places
	// 'required' => true,
    'comment' => 'A custom decimal field',
    'importable' => 'true',
    'audited' => true,
    'reportable' => true,
);
?>