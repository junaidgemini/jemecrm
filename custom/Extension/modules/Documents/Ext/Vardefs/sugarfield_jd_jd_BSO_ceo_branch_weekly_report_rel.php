<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
//ID
$dictionary['Document']['fields']['jd_jd_BSO_ceo_branch_weekly_report_id'] = array(
    'name' => 'jd_jd_BSO_ceo_branch_weekly_report_id',
    'rname' => 'id',
    'vname' => 'LBL_JD_JD_BSO_CEO_BRANCH_WEEKLY_REPORT_ID',
    'type' => 'id',
    'table' => 'jd_jd_BSO_ceo_branch_weekly_report',
    'isnull' => 'true',
    'module' => 'jd_jd_BSO_ceo_branch_weekly_report',
    'dbType' => 'id',
    'reportable' => false,
    'audited' => true,
    'duplicate_merge' => 'disabled',
    'required' => false
);
//Name
$dictionary['Document']['fields']['jd_jd_BSO_ceo_branch_weekly_report_name'] = array(
    'name' => 'jd_jd_BSO_ceo_branch_weekly_report_name',
    'rname' => 'name',
    'id_name' => 'jd_role_id',
    'vname' => 'LBL_JD_JD_BSO_CEO_BRANCH_WEEKLY_REPORT_NAME',
    'type' => 'relate',
    'link' => 'doc_jd_jd_BSO_ceo_branch_weekly_report_link',
    'table' => 'jd_jd_BSO_ceo_branch_weekly_report',
    'isnull' => 'true',
    'module' => 'jd_jd_BSO_ceo_branch_weekly_report',
    'source' => 'non-db',
    'required' => false,
);

//Link
$dictionary['Document']['fields']['doc_jd_jd_BSO_ceo_branch_weekly_report_link'] = array(
    'name'  =>  'doc_jd_jd_BSO_ceo_branch_weekly_report_link',
    'type'  =>  'link',
    'relationship'  =>  'doc_jd_jd_BSO_ceo_branch_weekly_report_rel',
    'module' => 'Documnets',
    'bean_name' => 'Documnet',
    'source' => 'non-db',
    'vname' => 'LBL_JD_USERS_ROLES_LINK',
);


//Relationship
$dictionary["Document"]["relationships"]["doc_jd_jd_BSO_ceo_branch_weekly_report_rel"] = array(
    'lhs_module' => 'jd_jd_BSO_ceo_branch_weekly_report',
    'lhs_table' =>  'jd_jd_BSO_ceo_branch_weekly_report',
    'lhs_key' => 'id',
    'rhs_module' => 'Documents',
    'rhs_table' =>  'documents',
    'rhs_key' =>  'jd_jd_BSO_ceo_branch_weekly_report_id',
    'relationship_type' =>  'one-to-many'
);
