<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['jd_advocacy']['fields']['jd_other'] = array(
	'name' => 'jd_other',
	'vname' => 'LBL_JD_OTHER',
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


$dictionary['jd_advocacy']['fields']['recieve_communications'] = array(
	'name' => 'recieve_communications',
	'vname' => 'LBL_RECIEVE_COMMUNICATIONS',
	'type' => 'enum',
	'options' => 'agree_for_communications_dom',
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


$dictionary['jd_advocacy']['fields']['recommend_to_others'] = array(
	'name' => 'recommend_to_others',
	'vname' => 'LBL_RECOMMEND_TO_OTHERS',
	'type' => 'enum',
	'options' => 'bool_dom',
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


$dictionary['jd_advocacy']['fields']['gender'] = array(
	'name' => 'gender',
	'vname' => 'LBL_GENDER',
	'type' => 'enum',
	'options' => 'gender_dom',
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


$dictionary['jd_advocacy']['fields']['jd_zone'] = array(
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


$dictionary['jd_advocacy']['fields']['occupation'] = array(
	'name' => 'occupation',
	'vname' => 'LBL_OCCUPATION',
	'type' => 'enum',
	'options' => 'occupation_dom',
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


$dictionary['jd_advocacy']['fields']['referral_program'] = array(
	'name' => 'referral_program',
	'vname' => 'LBL_REFERRAL_PROGRAM',
	'type' => 'enum',
	'options' => 'bool_dom',
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


$dictionary['jd_advocacy']['fields']['location'] = array(
	'name' => 'location',
	'vname' => 'LBL_LOCATION',
	'type' => 'enum',
	'options' => 'location_dom',
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


$dictionary['jd_advocacy']['fields']['customer_full_name'] = array(
	'name' => 'customer_full_name',
	'vname' => 'LBL_CUSTOMER_FULL_NAME',
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


$dictionary['jd_advocacy']['fields']['mobile'] = array(
	'name' => 'mobile',
	'vname' => 'LBL_MOBILE',
	'type' => 'phone',
    'dbType' => 'varchar',
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => true,
	'reportable' => true,
	'required' => true,
);


$dictionary['jd_advocacy']['fields']['recommend_reason'] = array(
	'name' => 'recommend_reason',
	'vname' => 'LBL_RECOMMEND_REASON',
	'type' => 'varchar',
	'audited' => true,
	'reportable' => true,
	'required' => true,
);


$dictionary['jd_advocacy']['fields']['comments'] = array(
	'name' => 'comments',
	'vname' => 'LBL_COMMENTS',
	'type' => 'text',
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => true,
	'reportable' => true,
	'required' => true,
);


$dictionary['jd_advocacy']['fields']['email'] = array(
	'name' => 'email',
	'vname' => 'LBL_EMAIL',
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

?>