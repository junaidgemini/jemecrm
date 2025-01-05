<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['jd_awareness']['fields']['attraction'] = array(
	'name' => 'attraction',
	'vname' => 'LBL_ATTRACTION',
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


$dictionary['jd_awareness']['fields']['comments'] = array(
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
);


$dictionary['jd_awareness']['fields']['customer_full_name'] = array(
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


$dictionary['jd_awareness']['fields']['gender'] = array(
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


$dictionary['jd_awareness']['fields']['jd_other'] = array(
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


$dictionary['jd_awareness']['fields']['jd_zone'] = array(
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


$dictionary['jd_awareness']['fields']['lapo_engagement_info'] = array(
	'name' => 'lapo_engagement_info',
	'vname' => 'LBL_LAPO_ENGAGEMENT_INFO',
	'type' => 'enum',
	'options' => 'lapo_engagement_info_dom',
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


$dictionary['jd_awareness']['fields']['lapo_hearing'] = array(
	'name' => 'lapo_hearing',
	'vname' => 'LBL_LAPO_HEARING',
	'type' => 'enum',
	'options' => 'lapo_hearing_dom',
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


$dictionary['jd_awareness']['fields']['location'] = array(
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


$dictionary['jd_awareness']['fields']['mobile'] = array(
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


$dictionary['jd_awareness']['fields']['occupation'] = array(
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


$dictionary['jd_awareness']['fields']['recieve_promotion'] = array(
	'name' => 'recieve_promotion',
	'vname' => 'LBL_RECIEVE_PROMOTION',
	'type' => 'enum',
	'options' => 'recieve_promotion_dom',
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


$dictionary['jd_awareness']['fields']['specify_other'] = array(
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

?>