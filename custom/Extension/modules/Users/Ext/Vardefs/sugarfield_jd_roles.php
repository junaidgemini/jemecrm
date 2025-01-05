<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
//ID
$dictionary['User']['fields']['jd_role_id'] = array(
    'name' => 'jd_role_id',
    'rname' => 'id',
    'vname' => 'LBL_JD_ROLE_ID',
    'type' => 'id',
    'table' => 'acl_roles',
    'isnull' => 'true',
    'module' => 'ACLRoles',
    'dbType' => 'id',
    'reportable' => false,
    'audited' => true,
    'duplicate_merge' => 'disabled',
    'required' => false
);
//Name
$dictionary['User']['fields']['jd_role_name'] = array(
    'name' => 'jd_role_name',
    'rname' => 'name',
    'id_name' => 'jd_role_id',
    'vname' => 'LBL_JD_ROLE_NAME',
    'type' => 'relate',
    'link' => 'jd_users_roles_link',
    'table' => 'acl_roles',
    'isnull' => 'true',
    'module' => 'ACLRoles',
    'source' => 'non-db',
    'required' => false,
);

//Link
$dictionary['User']['fields']['jd_users_roles_link'] = array(
    'name'  =>  'jd_users_roles_link',
    'type'  =>  'link',
    'relationship'  =>  'jd_users_roles_rel',
    'module' => 'ACLRoles',
    'bean_name' => 'ACL_Roles',
    'source' => 'non-db',
    'vname' => 'LBL_JD_USERS_ROLES_LINK',
);


//Relationship
$dictionary["User"]["relationships"]["jd_users_roles_rel"] = array(
    'lhs_module' => 'ACLRoles',
    'lhs_table' =>  'acl_roles',
    'lhs_key' => 'id',
    'rhs_module' => 'User',
    'rhs_table' =>  'User',
    'rhs_key' =>  'jd_role_id',
    'relationship_type' =>  'one-to-many'
);
