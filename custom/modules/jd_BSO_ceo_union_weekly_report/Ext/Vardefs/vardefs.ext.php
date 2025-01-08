<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['jd_BSO_ceo_union_weekly_report']['fields']['specify_other'] = array(
	'name' => 'specify_other',
	'vname' => 'LBL_SPECIFY_OTHER',
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


$dictionary['jd_BSO_ceo_union_weekly_report']['fields']['date_of_visit'] = array(
	'name' => 'date_of_visit',
	'vname' => 'LBL_DATE_OF_VISIT',
	'type' => 'date',
	'importable' => 'true',
	'audited' => true,
	'reportable' => true,
	'required' => true,
);


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


$dictionary['jd_BSO_ceo_union_weekly_report']['fields']['jd_status'] = array(
	'name' => 'jd_status',
	'vname' => 'LBL_JD_STATUS',
	'type' => 'enum',
	'options' => 'jd_ceo_union_status_dom',
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


$dictionary['jd_BSO_ceo_union_weekly_report']['fields']['jd_zone'] = array(
	'name' => 'jd_zone',
	'vname' => 'LBL_JD_ZONE',
	'type' => 'enum',
	'options' => 'jd_zone_dom',
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


$dictionary['jd_BSO_ceo_union_weekly_report']['fields']['any_aditional_feedback'] = array(
	'name' => 'any_aditional_feedback',
	'vname' => 'LBL_ANY_ADITIONAL_FEEDBACK',
	'type' => 'text',
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => true,
	'reportable' => true,
);


$dictionary['jd_BSO_ceo_union_weekly_report']['fields']['escalation_officer_email'] = array(
	'name' => 'escalation_officer_email',
	'vname' => 'LBL_ESCALATION_OFFICER_EMAIL',
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


$dictionary['jd_BSO_ceo_union_weekly_report']['fields']['escalation_officer_name'] = array(
	'name' => 'escalation_officer_name',
	'vname' => 'LBL_ESCALATION_OFFICER_NAME',
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


$dictionary['jd_BSO_ceo_union_weekly_report']['fields']['purpose_of_visit'] = array(
	'name' => 'purpose_of_visit',
	'vname' => 'LBL_PURPOSE_OF_VISIT',
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


$dictionary['jd_BSO_ceo_union_weekly_report']['fields']['branch_email'] = array(
	'name' => 'branch_email',
	'vname' => 'LBL_BRANCH_EMAIL',
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


$dictionary['jd_BSO_ceo_union_weekly_report']['fields']['jd_branch_state'] = array(
	'name' => 'jd_branch_state',
	'vname' => 'LBL_JD_BRANCH_STATE',
	'type' => 'enum',
	'options' => 'jd_state_dom',
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


$dictionary['jd_BSO_ceo_union_weekly_report']['fields']['demography'] = array(
	'name' => 'demography',
	'vname' => 'LBL_DEMOGRAPHY',
	'type' => 'enum',
	'options' => 'demography_dom',
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