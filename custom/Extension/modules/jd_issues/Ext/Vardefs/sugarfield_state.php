<?php
$dictionary['jd_issues']['fields']['state'] = array(
	'name' => 'state',
	'vname' => 'LBL_STATE',
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
?>