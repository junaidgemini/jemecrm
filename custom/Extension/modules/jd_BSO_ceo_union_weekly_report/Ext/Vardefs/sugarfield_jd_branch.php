<?php
$dictionary['jd_BSO_ceo_union_weekly_report']['fields']['jd_branch'] = array(
	'name' => 'jd_branch',
	'vname' => 'LBL_JD_BRANCH',
	'type' => 'enum',
	'options' => 'jd_branch_dom',
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
	'dependency' => 'equal($jd_branch_state,"selected_state")', // Add dependency logic
);
?>