<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['jd_retention']['fields']['comments'] = array(
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


$dictionary['jd_retention']['fields']['email'] = array(
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


$dictionary['jd_retention']['fields']['customer_full_name'] = array(
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


$dictionary['jd_retention']['fields']['gender'] = array(
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


$dictionary['jd_retention']['fields']['get_additional_service'] = array(
	'name' => 'get_additional_service',
	'vname' => 'LBL_GET_ADDITIONAL_SERVICE',
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


$dictionary['jd_retention']['fields']['jd_other'] = array(
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


$dictionary['jd_retention']['fields']['jd_zone'] = array(
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


$dictionary['jd_retention']['fields']['location'] = array(
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


$dictionary['jd_retention']['fields']['mobile'] = array(
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


$dictionary['jd_retention']['fields']['occupation'] = array(
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


$dictionary['jd_retention']['fields']['recieve_communications'] = array(
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


$dictionary['jd_retention']['fields']['satisfaction'] = array(
	'name' => 'satisfaction',
	'vname' => 'LBL_SATISFACTION',
	'type' => 'enum',
	'options' => 'jd_retention_satisfied_dom',
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


$dictionary['jd_retention']['fields']['specify_additional_service'] = array(
	'name' => 'specify_additional_service',
	'vname' => 'LBL_SPECIFY_ADDITIONAL_SERVICE',
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


$dictionary['jd_purchase']['fields']['specify_other'] = array(
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