<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
// // Create a Self-Referential Relate Field:
// //ID
// $dictionary['User']['fields']['jd_replacement_c'] = array(
//     'name' => 'jd_replacement_c',
//     'rname' => 'id',
//     'vname' => 'LBL_JD_REPLACEMENT_C',
//     'type' => 'id',
//     'table' => 'users',
//     'isnull' => 'true',
//     'module' => 'Users',
//     'dbType' => 'id',
//     'reportable' => false,
//     'audited' => true,
//     'duplicate_merge' => 'disabled',
//     'required' => false
// );
// //Name
// $dictionary['User']['fields']['jd_replacement_c_name'] = array(
//     'name' => 'jd_replacement_c_name',
//     'rname' => 'name',
//     'id_name' => 'jd_replacement_c',
//     'vname' => 'LBL_JD_REPLACEMENT_C_NAME',
//     'type' => 'relate',
//     'link' => 'jd_users_jd_replacement_c_link',
//     'table' => 'users',
//     'isnull' => 'true',
//     'module' => 'Users',
//     'source' => 'non-db',
//     'required' => false,
// );

// //Link
// $dictionary['User']['fields']['jd_users_jd_replacement_c_link'] = array(
//     'name'  =>  'jd_users_jd_replacement_c_link',
//     'type'  =>  'link',
//     'relationship'  =>  'jd_users_jd_replacement_c_rel',
//     'module' => 'Users',
//     'bean_name' => 'User',
//     'source' => 'non-db',
//     'vname' => 'LBL_JD_USERS_JD_REPLACEMENT_C_LINK',
// );


// //Relationship
// $dictionary["User"]["relationships"]["jd_users_jd_replacement_c_rel"] = array(
//     'lhs_module' => 'Users',
//     'lhs_table' =>  'users',
//     'lhs_key' => 'id',
//     'rhs_module' => 'Users',
//     'rhs_table' =>  'users',
//     'rhs_key' =>  'jd_replacement_c',
//     'relationship_type' =>  'one-to-many'
// );
