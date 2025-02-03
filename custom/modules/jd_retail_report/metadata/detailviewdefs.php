<?php
$module_name = 'jd_retail_report';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'actual_c',
            'label' => 'LBL_ACTUAL_C',
          ),
          1 => 
          array (
            'name' => 'target',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_TARGET',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'new_client',
            'label' => 'LBL_NEW_CLIENT',
          ),
          1 => 
          array (
            'name' => 'department_mobilized',
            'label' => 'LBL_DEPARTMENT_MOBILIZED',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'state',
            'label' => 'LBL_STATE',
          ),
          1 => 
          array (
            'name' => 'branch',
            'label' => 'LBL_BRANCH',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'zone',
            'label' => 'LBL_ZONE',
          ),
          1 => 
          array (
            'name' => 'jd_attachment',
            'comment' => 'Upload field for <ModuleName>',
            'label' => 'LBL_JD_ATTACHMENT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'transport',
            'label' => 'LBL_TRANSPORT',
          ),
          1 => 
          array (
            'name' => 'variance',
            'label' => 'LBL_VARIANCE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'sitting_balance',
            'comment' => 'A custom decimal field',
            'label' => 'LBL_SITTING_BALANCE',
          ),
          1 => 'description',
        ),
      ),
    ),
  ),
);
;
?>
