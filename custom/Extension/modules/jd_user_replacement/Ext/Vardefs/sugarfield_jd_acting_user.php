<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
//ID
$dictionary['jd_user_replacement']['fields']['jd_acting_user_id'] = array(
    'name' => 'jd_acting_user_id',
    'rname' => 'id',
    'vname' => 'LBL_JD_ACTING_USER_ID',
    'type' => 'id',
    'table' => 'users',
    'isnull' => 'true',
    'module' => 'Users',
    'dbType' => 'id',
    'reportable' => false,
    'audited' => true,
    'duplicate_merge' => 'disabled',
    'required' => false
);
//Name
$dictionary['jd_user_replacement']['fields']['jd_acting_user_name'] = array(
    'name' => 'jd_acting_user_name',
    'rname' => 'name',
    'id_name' => 'jd_acting_user_id',
    'vname' => 'LBL_JD_ACTING_USER_NAME',
    'type' => 'relate',
    'link' => 'jd_user_replacement_secondary_users_link',
    'table' => 'users',
    'isnull' => 'true',
    'module' => 'Users',
    'source' => 'non-db',
    'required' => false,
);

//Link
$dictionary['jd_user_replacement']['fields']['jd_user_replacement_secondary_users_link'] = array(
    'name'  =>  'jd_user_replacement_secondary_users_link',
    'type'  =>  'link',
    'relationship'  =>  'jd_user_replacement_secondary_users_rel',
    'module' => 'Users',
    'bean_name' => 'User',
    'source' => 'non-db',
    'vname' => 'LBL_JD_USER_REPLACEMENT_USER_LINK',
);


//Relationship
$dictionary["jd_banking_target"]["relationships"]["jd_user_replacement_secondary_users_rel"] = array(
    'lhs_module' => 'Users',
    'lhs_table' =>  'users',
    'lhs_key' => 'id',
    'rhs_module' => 'jd_user_replacement',
    'rhs_table' =>  'jd_user_replacement',
    'rhs_key' =>  'jd_acting_user_id',
    'relationship_type' =>  'one-to-many'
);
