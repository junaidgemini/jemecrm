<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['jd_cco_customer_service']['fields']['address_line_1'] = array(
	'name' => 'address_line_1',
	'vname' => 'LBL_ADDRESS_LINE_1',
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


$dictionary['jd_cco_customer_service']['fields']['address_line_2'] = array(
	'name' => 'address_line_2',
	'vname' => 'LBL_ADDRESS_LINE_2',
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


$dictionary['jd_cco_customer_service']['fields']['branch'] = array(
	'name' => 'branch',
	'vname' => 'LBL_BRANCH',
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
	'unified_search' => false,
	'merge_filter' => 'disabled',
);


$dictionary['jd_cco_customer_service']['fields']['country'] = array(
	'name' => 'country',
	'vname' => 'LBL_COUNTRY',
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


$dictionary['jd_cco_customer_service']['fields']['customer_category'] = array(
	'name' => 'customer_category',
	'vname' => 'LBL_CUSTOMER_CATEGORY',
	'type' => 'enum',
	'options' => 'jd_customer_catrgory_dom',
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


$dictionary['jd_cco_customer_service']['fields']['dob'] = array(
	'name' => 'dob',
	'vname' => 'LBL_DOB',
	'type' => 'date',
	'importable' => 'true',
	'audited' => true,
	'reportable' => true,
	'required' => true,
);


$dictionary['jd_cco_customer_service']['fields']['email'] = array(
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


$dictionary['jd_cco_customer_service']['fields']['employment_nature'] = array(
	'name' => 'employment_nature',
	'vname' => 'LBL_EMPLOYMENT_NATURE',
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


$dictionary['jd_cco_customer_service']['fields']['full_name'] = array(
	'name' => 'full_name',
	'vname' => 'LBL_FULL_NAME',
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


$dictionary['jd_cco_customer_service']['fields']['gender'] = array(
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


$dictionary['jd_cco_customer_service']['fields']['identifier_issue_country'] = array(
	'name' => 'identifier_issue_country',
	'vname' => 'LBL_IDENTIFIER_ISSUE_COUNTRY',
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


$dictionary['jd_cco_customer_service']['fields']['jd_customer_no'] = array(
	'name' => 'jd_customer_no',
	'vname' => 'LBL_JD_CUSTOMER_NO',
	'type' => 'integer',
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


$dictionary['jd_cco_customer_service']['fields']['jd_from_date'] = array(
	'name' => 'jd_from_date',
	'vname' => 'LBL_JD_FROM_DATE',
	'type' => 'date',
	'importable' => 'true',
	'audited' => true,
	'reportable' => true,
	'required' => true,
);


$dictionary['jd_cco_customer_service']['fields']['jd_telephone'] = array(
	'name' => 'jd_telephone',
	'vname' => 'LBL_JD_TELEPHONE',
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
);


$dictionary['jd_cco_customer_service']['fields']['jd_to_date'] = array(
	'name' => 'jd_to_date',
	'vname' => 'LBL_JD_TO_DATE',
	'type' => 'date',
	'importable' => 'true',
	'audited' => true,
	'reportable' => true,
	'required' => true,
);


$dictionary['jd_cco_customer_service']['fields']['kyc_tier'] = array(
	'name' => 'kyc_tier',
	'vname' => 'LBL_KYC_TIER',
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


$dictionary['jd_cco_customer_service']['fields']['language'] = array(
	'name' => 'language',
	'vname' => 'LBL_LANGUAGE',
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


$dictionary['jd_cco_customer_service']['fields']['mobile'] = array(
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


$dictionary['jd_cco_customer_service']['fields']['nationality'] = array(
	'name' => 'nationality',
	'vname' => 'LBL_NATIONALITY',
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


$dictionary['jd_cco_customer_service']['fields']['operation'] = array(
	'name' => 'operation',
	'vname' => 'LBL_OPERATION',
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


$dictionary['jd_cco_customer_service']['fields']['origin_state'] = array(
	'name' => 'origin_state',
	'vname' => 'LBL_ORIGIN_STATE',
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


$dictionary['jd_cco_customer_service']['fields']['private_customer'] = array(
	'name' => 'private_customer',
	'vname' => 'LBL_PRIVATE_CUSTOMER',
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


$dictionary['jd_cco_customer_service']['fields']['s_name'] = array(
	'name' => 's_name',
	'vname' => 'LBL_S_NAME',
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


$dictionary['jd_cco_customer_service']['fields']['service'] = array(
	'name' => 'service',
	'vname' => 'LBL_SERVICE',
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


$dictionary['jd_cco_customer_service']['fields']['source'] = array(
	'name' => 'source',
	'vname' => 'LBL_SOURCE',
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


$dictionary['jd_cco_customer_service']['fields']['title'] = array(
	'name' => 'title',
	'vname' => 'LBL_TITLE',
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


$dictionary['jd_cco_customer_service']['fields']['type'] = array(
	'name' => 'type',
	'vname' => 'LBL_TYPE',
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


$dictionary['jd_cco_customer_service']['fields']['ubs_component'] = array(
	'name' => 'ubs_component',
	'vname' => 'LBL_UBS_COMPONENT',
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


$dictionary['jd_cco_customer_service']['fields']['unique_id_type'] = array(
	'name' => 'unique_id_type',
	'vname' => 'LBL_UNIQUE_ID_TYPE',
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


$dictionary['jd_cco_customer_service']['fields']['unique_id_value'] = array(
	'name' => 'unique_id_value',
	'vname' => 'LBL_UNIQUE_ID_VALUE',
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


$dictionary['jd_cco_customer_service']['fields']['users_id'] = array(
	'name' => 'users_id',
	'vname' => 'LBL_USERS_ID',
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