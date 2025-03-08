<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = array();
$hook_array['before_save'][] = array(1, 'set email time', 'custom/modules/jd_BSO_ceo_union_weekly_report/setSendEmailTime.php', 'setSendEmailTimeClass', 'setSendEmailTimeMethod');

$hook_array['after_save'] = Array();
// Save Attachment
// $hook_array['after_save'][] = Array(1, 'Attachment', 'custom/modules/jd_BSO_ceo_union_weekly_report/SaveAttachment.php','SaveAttachmentClass', 'SaveAttachmentMethod');
$hook_array['after_save'][] = Array(2, 'send fst email', 'custom/modules/jd_BSO_ceo_union_weekly_report/SendEmailHook.php', 'SendEmailHook', 'sendNotificationEmail');

?>