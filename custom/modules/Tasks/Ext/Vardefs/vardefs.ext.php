<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['Task']['fields']['jd_branch'] = array(
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
	// 'parentenum' => 'jd_branch_state',
	// 'dependency' => 'jd_branch_state',
	'dependency' => 'equal($jd_branch_state,"selected_state")', // Add dependency logic
);


$dictionary['Task']['fields']['jd_zone'] = array(
	'name' => 'jd_zone',
	'vname' => 'LBL_JD_ZONE',
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


$dictionary['Task']['fields']['jd_branch_state'] = array(
	'name' => 'jd_branch_state',
	'vname' => 'LBL_JD_BRANCH_STATE',
	'type' => 'enum',
	'options' => 'jd_branch_state_dom',
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