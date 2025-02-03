<?php
$module_name = 'jd_cco_customer_service';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'users_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_USERS_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'users_id',
      ),
      'jd_to_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_JD_TO_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_to_date',
      ),
      'jd_from_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_JD_FROM_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_from_date',
      ),
      'private_customer' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PRIVATE_CUSTOMER',
        'width' => '10%',
        'default' => true,
        'name' => 'private_customer',
      ),
      'type' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TYPE',
        'width' => '10%',
        'default' => true,
        'name' => 'type',
      ),
      'source' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SOURCE',
        'width' => '10%',
        'default' => true,
        'name' => 'source',
      ),
      'email' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL',
        'width' => '10%',
        'default' => true,
        'name' => 'email',
      ),
      'jd_telephone' => 
      array (
        'type' => 'phone',
        'label' => 'LBL_JD_TELEPHONE',
        'width' => '10%',
        'default' => true,
        'name' => 'jd_telephone',
      ),
      'nationality' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NATIONALITY',
        'width' => '10%',
        'default' => true,
        'name' => 'nationality',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
      'kyc_tier' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_KYC_TIER',
        'width' => '10%',
        'default' => true,
        'name' => 'kyc_tier',
      ),
      'origin_state' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ORIGIN_STATE',
        'width' => '10%',
        'default' => true,
        'name' => 'origin_state',
      ),
      'unique_id_type' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_UNIQUE_ID_TYPE',
        'width' => '10%',
        'default' => true,
        'name' => 'unique_id_type',
      ),
      'unique_id_value' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_UNIQUE_ID_VALUE',
        'width' => '10%',
        'default' => true,
        'name' => 'unique_id_value',
      ),
      'operation' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OPERATION',
        'width' => '10%',
        'default' => true,
        'name' => 'operation',
      ),
      's_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_S_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 's_name',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
;
?>
