<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['jd_agent_banking_report']['fields']['actual'] = array(
	'name' => 'actual',
	'vname' => 'LBL_ACTUAL',
	'type' => 'decimal',
	'len' => '18',
	'precision' => '2',
	'required' => true,
	'comment' => 'A custom decimal field',
	'importable' => 'true',
	'audited' => true,
	'reportable' => true,
);


$dictionary['jd_agent_banking_report']['fields']['agents_onboarded'] = array(
	'name' => 'agents_onboarded',
	'vname' => 'LBL_AGENTS_ONBOARDED',
	'type' => 'varchar',
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => true,
	'reportable' => true,
);


$dictionary['jd_agent_banking_report']['fields']['report_type'] = array(
	'name' => 'report_type',
	'vname' => 'LBL_REPORT_TYPE',
	'type' => 'enum',
	'options' => 'report_type_dom',
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => true,
	'reportable' => true,
	'unified_search' => false,
	'merge_filter' => 'disabled',
);


$dictionary['jd_agent_banking_report']['fields']['target'] = array(
	'name' => 'target',
	'vname' => 'LBL_TARGET',
	'type' => 'decimal',
	'len' => '18',
	'precision' => '2',
	'required' => true,
	'comment' => 'A custom decimal field',
	'importable' => 'true',
	'audited' => true,
	'reportable' => true,
);

?>