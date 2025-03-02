<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
$hook_version = 1;
$hook_array = array();
// position, file, function 
$hook_array['before_save'] = array();
$hook_array['before_save'][] = array(1, 'set email time', 'custom/modules/jd_customer_satisfaction/setSendEmailTime.php', 'setSendEmailTimeClass', 'setSendEmailTimeMethod');

$hook_array['after_save'] = array();
$hook_array['after_save'][] = array(1, 'send fst email', 'custom/modules/jd_customer_satisfaction/SendEmailHook.php', 'SendEmailHook', 'sendNotificationEmail');
