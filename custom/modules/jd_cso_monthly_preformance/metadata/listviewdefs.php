<?php
$module_name = 'jd_cso_monthly_preformance';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'JD_CSO_NEW_CLIENT_PERCENT' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_NEW_CLIENT_PERCENT',
    'width' => '10%',
    'default' => true,
  ),
  'JD_CSO_TOTAL_BORROWERS' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_TOTAL_BORROWERS',
    'width' => '10%',
    'default' => true,
  ),
  'JD_CSO_DEPOSIT_MOBILISED_PERCENT' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_DEPOSIT_MOBILISED_PERCENT',
    'width' => '10%',
    'default' => true,
  ),
  'JD_CSO_OVERALL_SCORE' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_OVERALL_SCORE',
    'width' => '10%',
    'default' => true,
  ),
  'JD_CSO_PAR_PERCENT' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_PAR_PERCENT',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'JD_CSO_NEW_CLIENTS_TARGET' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_NEW_CLIENTS_TARGET',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_DISBURSEMENT_ACTUAL' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_DISBURSEMENT_ACTUAL',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_DEPOSIT_MOBILISED_ACTUAL' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_DEPOSIT_MOBILISED_ACTUAL',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_BRANCH' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_JD_CSO_BRANCH',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_DISBURSEMENT_TARGET' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_DISBURSEMENT_TARGET',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_BORROWERS_ACTUAL' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_BORROWERS_ACTUAL',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_LOAN_PORTFOLIO_ACTUAL' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_LOAN_PORTFOLIO_ACTUAL',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_DEPOSIT_BALANCE' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_DEPOSIT_BALANCE',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_LOAN_PORTFOLIO_TARGET' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_LOAN_PORTFOLIO_TARGET',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_MONTH' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_JD_CSO_MONTH',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_BRANCH_SIZE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_JD_CSO_BRANCH_SIZE',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_DEPOSIT_BALANCE_TARGET' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_DEPOSIT_BALANCE_TARGET',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_BRANCH_STATE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_JD_CSO_BRANCH_STATE',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_CLIENTS_ACTUAL' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_CLIENTS_ACTUAL',
    'width' => '10%',
    'default' => false,
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => false,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => false,
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_MODIFIED_NAME',
    'id' => 'MODIFIED_USER_ID',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_LOAN_PORTFOLIO_PERCENT' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_LOAN_PORTFOLIO_PERCENT',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_DEPOSIT_MOBILISED_BALANCE' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_DEPOSIT_MOBILISED_BALANCE',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_AMOUNT_OF_LOAN_OVERDUE' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_AMOUNT_OF_LOAN_OVERDUE',
    'width' => '10%',
    'default' => false,
  ),
  'JD_CSO_DEPOSIT_MOBILISED_TARGET' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_JD_CSO_DEPOSIT_MOBILISED_TARGET',
    'width' => '10%',
    'default' => false,
  ),
);
;
?>
